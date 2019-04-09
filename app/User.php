<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','foto',
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
	
	public function getProduct()
    {
       return $this->hasMany('App\Product_model', 'id_user','id');
	   
    }
	
	public function getProvince(){
        return $this->belongsTo('App\Province_model', 'id_province', 'id');
    }
	public function getCity(){
        return $this->belongsTo('App\City_model', 'id_city', 'id');
    }
	public function getDistrict(){
        return $this->belongsTo('App\District_model', 'id_district', 'id');
    }
	public function getVillage(){
        return $this->belongsTo('App\Village_model', 'id_village', 'id');
    }
	
}
