<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class BlogReport extends Model
{
    protected $table = 'blog_report';

    protected $primaryKey = 'blog_report_id';

    protected $fillable = [
        'user_id','blog_id','report'
    ];

   
}