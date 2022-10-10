<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = 'share';

    protected $primaryKey = 'share_id';

    protected $fillable = [
        'user_id','key','type','value','share_by'
    ];

    
}