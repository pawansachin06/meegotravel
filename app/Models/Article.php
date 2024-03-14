<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $fillable = [
        'user_id', 'name', 'slug', 'excerpt', 'status',
        'folder', 'content', 'order',
    ];

    protected $keyType = 'string';

    public function getExcerpt()
    {
        return !empty($this->excerpt) ? $this->excerpt : '';
    }

    public function getPermalink(){
        return route('articles.front.show', ( !empty($this->slug) ? $this->slug : $this->id ));
    }

    public function getFeaturedImage(){
        // $assets = $this->assets;
        // try {
        //     $assets = json_decode($assets, true);
        // } catch(Exception $e) {
        //     $assets = [];
        // }
        // $coverImage = '';
        // if( !empty($assets) && count($assets) ){
        //     foreach ($assets as $asset) {
        //         if($asset['type'] == 'image'){
        //             $coverImage = $asset['filename'];
        //             break;
        //         }
        //     }
        // }
        // if(!empty($coverImage)){
        //     return '/storage/blogs/' . $this->folder . '/' . $coverImage;
        // } else {
            return 'https://dummyimage.com/360x360';
        // }
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class, 'article_pivot_article_category', 'article_id', 'article_category_id');
    }
}
