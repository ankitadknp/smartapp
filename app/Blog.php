<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'blog_title','category_id','blog_content','status','blog_title_ab','blog_title_he','blog_content_ab','blog_content_he'
    ];

    /**
     * Get the category record associated with the blog.
    */

    public function category()
    {
        return $this->hasOne('App\Category', 'category_id');
    }
}