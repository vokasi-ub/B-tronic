<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City_model extends Model
{
    protected $table = 'cities';
	 public $primaryKey = 'id';
	 public $timestamps = false;
	 
	 
	public function getProvince(){
        return $this->belongsTo('App\Province_model', 'province_id', 'id');
    }
	
	public function getCity()
    {
       return $this->hasMany('App\District_model', 'city_id','id');
	   
    }
	public function getUser()
    {
       return $this->hasMany('App\user', 'id_city','id');
	   
    }
}
