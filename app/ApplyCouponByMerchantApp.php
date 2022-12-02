<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class ApplyCouponByMerchantApp extends Model
{
    protected $table = 'apply_coupon_by_merchant';

    protected $fillable = [
        'user_id','coupon_id'
    ];

}