<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserDetail;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	public function userDetails()
    {
        return $this->hasOne('App\UserDetail','user_id');
    } 
	public function getBanksUserId(){
		return $this->hasMany('App\UserBankMapping','user_id');
	}
	public function getAssetsUserId(){
		return $this->hasMany('App\UserAsset','user_id');
	}
}
