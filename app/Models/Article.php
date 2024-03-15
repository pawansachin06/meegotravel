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
        if(!empty($this->featured_images) && count($this->featured_images)){
            $featured_image = $this->featured_images->first();
            return '/storage/' . $featured_image->folder . '/' . $featured_image->name;
        }
        return 'https://dummyimage.com/360x360';
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class, 'article_pivot_article_category', 'article_id', 'article_category_id');
    }

    public function photos(){
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function featured_images(){
        return $this->photos()->where('tag', 'featured_image')->latest();
    }
}
