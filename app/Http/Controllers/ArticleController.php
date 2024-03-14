<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Hidehalo\Nanoid\Client;
use App\Enums\ModelStatusEnum;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Exception;

class ArticleController extends Controller
{
    public function frontIndex(){
        $perPage = 10;
        $items = Article::where('status', ModelStatusEnum::PUBLISHED)
                ->with('author')
                ->latest()
                ->paginate($perPage)->withQueryString();
        $categories = ArticleCategory::where('status', ModelStatusEnum::PUBLISHED)
                        ->withCount('articles')->get(['id', 'slug', 'name']);
        $breadcrumbs = [ ['name'=> 'Blog', 'link'=> route('articles.front.index')] ];
        return view('articles.front.index', [
            'items' => $items,
            'perPage' => $perPage,
            'categories' => $categories,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function frontShow(Request $req, $idOrSlug)
    {
        $item = Article::where('status', ModelStatusEnum::PUBLISHED)->where('slug', $idOrSlug)->orWhere('id', $idOrSlug)->firstOrFail();
        $categories = ArticleCategory::withCount('articles')->get(['id', 'slug', 'name']);

        $blog_post_ids = $item->categories->pluck('id')->toArray();
        $related_items = Article::where('status', ModelStatusEnum::PUBLISHED)->where('id', '!=', $item->id)
            ->whereHas('categories', function ($q) use ($blog_post_ids) {
                $q->whereIn('article_category_id', $blog_post_ids);
        })->get();
        $breadcrumbs = [
            ['name'=> 'Blog', 'link'=> route('articles.front.index')],
            // ['name'=> 'Blog', 'link'=> route('articles.front.index')]
        ];
        return view('articles.front.show', [
            'item' => $item,
            'breadcrumbs' => $breadcrumbs,
            'related_items' => $related_items,
            'categories' => $categories,
        ]);
    }

    public function index()
    {
        $perPage = 10;
        $items = Article::latest()->paginate($perPage)->withQueryString();
        return view('articles.index', [
            'items' => $items,
            'perPage' => $perPage,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        try {
            $currentUser = $req->user();
            $client = new Client();
            $nano_id = $client->generateId();
            $item = Article::create([
                'name' => 'New Article',
                'user_id'=> $currentUser->id,
                'slug' => $nano_id,
            ]);
            return response()->json([
                'success' => true,
                'redirect' => route('articles.edit', $item) ,
                'message' => 'Article created successfully',
                'resetForm' => true,
            ]);
        } catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => []
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = ArticleCategory::where('status', ModelStatusEnum::PUBLISHED)->get(['id', 'slug', 'name']);
        return view('articles.edit', [
            'item' => $article,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Article $article)
    {
        $req->merge(['slug' => Str::slug($req['slug']) ]);
        $validated = $req->validate([
            'name'=> ['required', 'string', 'max:255'],
            'slug'=> ['required', 'string', 'max:255', Rule::unique(Article::class)->ignore($article->id)],
            'status'=> [new Enum(ModelStatusEnum::class)],
            'content' => ['nullable', 'string'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'order' => ['required', 'numeric', 'gt:-1'],
        ]);
        try {
            $currentUser = $req->user();
            $validated['user_id'] = $currentUser->id;
            $article->update($validated);
            $article->categories()->sync($req->category);
        } catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => [],
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Article updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        try {
            $article->delete();
        } catch(Exception $e){
            return response()->json([
                'success'=> false,
                'message'=> $e->getMessage(),
            ]);
        }
        return response()->json([
            'success'=> true,
            'message'=> 'Deleted',
        ]);
    }
}
