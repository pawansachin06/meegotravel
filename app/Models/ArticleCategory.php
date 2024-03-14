<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $fillable = [
        'parent_id', 'name', 'slug', 'excerpt', 'status',
        'folder', 'content', 'order',
    ];

    protected $keyType = 'string';

    public function getPermalink(){
        return route('articles-categories.front.show', ( !empty($this->slug) ? $this->slug : $this->id ));
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_pivot_article_category', 'article_category_id', 'article_id');
    }
}
