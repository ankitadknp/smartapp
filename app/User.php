<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\UserRoles;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'first_name', 'email', 'password','last_name','phone_number','id_number','marital_status','no_of_child','occupation','education_level','business_name','registration_number','website','business_activity','business_sector','establishment_year','business_logo','business_hours','user_status','verify_otp','is_verified_mobile_no','verify_otp_time','street_address_name','street_number','house_number','city','district','status','longitude','latitude','location_url','profile_pic','is_account_delete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserRole() {
        return $this->hasOne("App\UserRoles", "user_id", "id");
    }
}
