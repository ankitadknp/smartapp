<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponQRcode extends Model
{
    protected $table = 'coupon_qrcode';
    protected $primaryKey = 'id';

    protected $fillable = [
        'coupon_id', 'qrcode_url', 'qrcode_file',
    ];
}
