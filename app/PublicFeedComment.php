<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class PublicFeedComment extends Model
{
    protected $table = 'public_feed_comment';

    protected $fillable = [
        'user_id','public_feed_id','comment','comment_like_count','comment_unlike_count','image'
    ];
}