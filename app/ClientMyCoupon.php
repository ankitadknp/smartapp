<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class ClientMyCoupon extends Model
{
    protected $table = 'client_my_coupon';
    protected $primaryKey = 'client_my_coupon_id';

    protected $fillable = [
        'user_id','coupon_id'
    ];

}