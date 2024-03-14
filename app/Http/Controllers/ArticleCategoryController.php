<?php

namespace App\Http\Controllers;

use App\Enums\ModelStatusEnum;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Hidehalo\Nanoid\Client;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Exception;

class ArticleCategoryController extends Controller
{

    public function frontShow(Request $req, $idOrSlug)
    {
        $item = ArticleCategory::where('status', ModelStatusEnum::PUBLISHED)->where('slug', $idOrSlug)->orWhere('id', $idOrSlug)->firstOrFail();
        $categories = ArticleCategory::withCount('articles')->get(['id', 'slug', 'name']);

        $blog_post_ids = [$item->id];
        $related_items = Article::where('status', ModelStatusEnum::PUBLISHED)->whereHas('categories', function ($q) use ($blog_post_ids) {
                $q->whereIn('article_category_id', $blog_post_ids);
        })->get();
        $breadcrumbs = [
            ['name'=> 'Blog', 'link'=> route('articles.front.index')],
            ['name'=> $item->name, 'link'=> $item->getPermalink()]
        ];
        return view('article-categories.front.show', [
            'item' => $item,
            'breadcrumbs' => $breadcrumbs,
            'related_items' => $related_items,
            'categories' => $categories,
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $items = ArticleCategory::latest()->paginate($perPage)->withQueryString();
        return view('article-categories.index', [
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
            $client = new Client();
            $nano_id = $client->generateId();
            $item = ArticleCategory::create([
                'name' => 'New Category',
                'slug' => $nano_id,
            ]);
            return response()->json([
                'success' => true,
                'redirect' => route('article-categories.edit', $item) ,
                'message' => 'Article category created successfully',
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
    public function show(ArticleCategory $articleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('article-categories.edit', [
            'item' => $articleCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, ArticleCategory $articleCategory)
    {
        $req->merge(['slug' => Str::slug($req['slug']) ]);
        $validated = $req->validate([
            'name'=> ['required', 'string', 'max:255'],
            'slug'=> ['required', 'string', 'max:255', Rule::unique(ArticleCategory::class)->ignore($articleCategory->id)],
            'status'=> [new Enum(ModelStatusEnum::class)],
            'content' => ['nullable', 'string'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'order' => ['required', 'numeric', 'gt:-1'],
        ]);
        try {
            $articleCategory->update($validated);
        } catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => [],
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Article category updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        try {
            $articleCategory->delete();
        } catch(Exception $e){
            return response()->json(['success'=> false, 'message'=> $e->getMessage()]);
        }
        return response()->json([
            'success'=> true,
            'message'=> 'Deleted',
        ]);
    }
}
