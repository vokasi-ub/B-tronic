<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province_model extends Model
{
     protected $table = 'provinces';
	 public $primaryKey = 'id';
	 public $timestamps = false;
	 
	public function getCity()
    {
       return $this->hasMany('App\City_model', 'province_id','id');
	   
    }
	
	public function getUser()
    {
       return $this->hasMany('App\user', 'id_province','id');
    }
}
