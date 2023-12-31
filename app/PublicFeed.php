<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class PublicFeed extends Model
{
    protected $table = 'public_feed';

    protected $primaryKey = 'public_feed_id';

    protected $fillable = [
        'public_feed_title','content','status','public_feed_title_ab','public_feed_title_he','content_ab','content_he','short_content','short_content_ab','short_content_he','feed_like_count','feed_unlike_count'
    ];

    public function images()
    {
        return $this->hasMany('App\PublicFeedImage', 'public_feed_id');
    }
}