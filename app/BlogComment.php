<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $table = 'blog_comment';

    protected $fillable = [
        'user_id','blog_id','comment','comment_like_count','comment_unlike_count','image'
    ];
}