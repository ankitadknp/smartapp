<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    protected $primaryKey = 'coupon_id';

    protected $fillable = [
        'coupon_code','discount_amount','discount_type','location_id','expiry_date','user_id','coupon_title','coupon_description','category_id','coupon_title_ar','coupon_title_he','coupon_description_he','coupon_description_ar'
    ];

}