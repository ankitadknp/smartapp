<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class BlogLike extends Model
{
    protected $table = 'blog_like';

    protected $fillable = [
        'blog_id','is_like','user_id'
    ];
}