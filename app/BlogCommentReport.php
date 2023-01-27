<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class BlogCommentReport extends Model
{
    protected $table = 'blog_comment_report';

    protected $fillable = [
        'blog_comment_id','user_id'
    ];

   
}