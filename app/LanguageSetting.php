<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class LanguageSetting extends Model
{
    protected $table = 'language_setting';

    protected $fillable = [
        'language_id','user_id'
    ];
}