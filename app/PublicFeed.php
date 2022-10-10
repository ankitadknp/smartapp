<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class PublicFeed extends Model
{
    protected $table = 'public_feed';

    protected $primaryKey = 'public_feed_id';

    protected $fillable = [
        'public_feed_title','content','status'
    ];

    public function images()
    {
        return $this->hasMany('App\PublicFeedImage', 'public_feed_id');
    }
}