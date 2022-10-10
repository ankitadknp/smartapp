<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'blog_title','category_id','blog_content','status'
    ];

    /**
     * Get the category record associated with the blog.
    */

    public function category()
    {
        return $this->hasOne('App\Category', 'category_id');
    }
}