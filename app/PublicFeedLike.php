<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class PublicFeedLike extends Model
{
    protected $table = 'public_feed_like';

    protected $fillable = [
        'user_id','public_feed_id','is_like'
    ];
}