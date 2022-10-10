<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class PublicFeedImage extends Model
{
    protected $table = 'public_feed_images';

    protected $fillable = [
        'public_feed_id','image'
    ];
}