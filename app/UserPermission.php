<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermission extends Model {

    use SoftDeletes;

    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function roleTypes() {
        return $this->hasMany('App\UserRolePermission', "permission_id", 'id');
    }

}
