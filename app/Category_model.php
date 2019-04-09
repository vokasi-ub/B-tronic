<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_model extends Model
{
     protected $table = 'kategori';
	 public $primaryKey = 'id';
	
	 
	 protected $fillable = array(
        'kategori',
        'description'
	 );
	 
	 public $timestamps = false;
	 
	public function getProduct()
    {
       return $this->hasMany('App\Product_model', 'id_kategori','id');
	   
    }
}
