<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'blog_title','category_id','blog_content','status','blog_title_ab','blog_title_he','blog_content_ab','blog_content_he','short_content','short_content_ab','short_content_he','blog_like_count','blog_unlike_count'   ];

    /**
     * Get the category record associated with the blog.
    */

    public function category()
    {
        return $this->hasOne('App\Category', 'category_id');
    }
}