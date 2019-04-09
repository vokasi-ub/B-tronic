<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District_model extends Model
{
    protected $table = 'districts';
	 public $primaryKey = 'id';
	 public $timestamps = false;
	 
	 
	public function getCity(){
        return $this->belongsTo('App\City_model', 'City_id', 'id');
    }
	
	public function getVillage()
    {
       return $this->hasMany('App\Village_model', 'ditrict_id','id');
	   
    }
	public function getUser()
    {
       return $this->hasMany('App\user', 'id_district','id');
	   
    }
}
