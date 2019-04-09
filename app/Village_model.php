<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village_model extends Model
{
   protected $table = 'villages';
	 public $primaryKey = 'id';
	 public $timestamps = false;
	 
	 
	public function getDistrict(){
        return $this->belongsTo('App\District_model', 'district_id', 'id');
    }
	
	public function getUser()
    {
       return $this->hasMany('App\user', 'id_village','id');
    }
}
