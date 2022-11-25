<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRolePermission extends Model {

    protected $table = 'role_has_permission';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'module_name','permission_id','controller_name'
    ];

}
