<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class PublicFeedReport extends Model
{
    protected $table = 'public_feed_report';

    protected $primaryKey = 'public_feed_report_id';

    protected $fillable = [
        'user_id','public_feed_id','report'
    ];

    
}