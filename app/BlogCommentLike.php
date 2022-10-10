<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class BlogCommentLike extends Model
{
    protected $table = 'blog_comment_like';

    protected $fillable = [
        'blog_id','is_like','user_id','blog_comment_id'
    ];
}