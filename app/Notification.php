<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'notification_id';

    protected $fillable = [
        'user_id','title','description','status','type','blog_id','feed_id','coupon_id'
    ];
}