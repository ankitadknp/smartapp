<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponTerm extends Model
{
    protected $table = 'coupon_terms_conditions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'coupon_id', 'term_condition'
    ];
}
