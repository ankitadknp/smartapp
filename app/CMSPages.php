<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class CMSPages extends Model
{
    protected $table = 'cms_pages';

    protected $fillable = [
        'title','title_ab','title_he','content','content_ab','content_he','status'
    ];

}