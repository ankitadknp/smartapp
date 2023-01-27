<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class FeedCommentReport extends Model
{
    protected $table = 'feed_comment_report';

    protected $fillable = [
        'public_feed_comment_id','user_id'
    ];

   
}