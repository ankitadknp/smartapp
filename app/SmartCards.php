<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmartCards extends Model
{
    protected $table = 'smart_cards';
    protected $primaryKey = 'id';

    protected $fillable = [
        'status', 'user_id',
    ];
}
