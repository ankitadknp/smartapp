<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    protected $primaryKey = 'coupon_id';

    protected $fillable = [
        'coupon_code','discount_amount','discount_type','location','expiry_date','user_id','term_condition','coupon_title','coupon_description','category_id','coupon_title_ab','coupon_title_he'
    ];

}