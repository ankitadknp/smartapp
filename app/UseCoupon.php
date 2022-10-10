<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class UseCoupon extends Model
{
    protected $table = 'use_coupon';
    protected $primaryKey = 'use_coupon_id';

    protected $fillable = [
        'user_id','coupon_id'
    ];

}