<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class PublicFeedCommentLike extends Model
{
    protected $table = 'public_feed_comment_like';

    protected $fillable = [
        'user_id','public_feed_id','public_feed_comment_id','is_like'
    ];
}