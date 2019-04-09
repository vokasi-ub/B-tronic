<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Category_model;

class Product_model extends Model
{
    protected $table = 'product';
	public $primaryKey = 'id';
	 
	protected $fillable = array(
        'id_kategori',
        'id_user',
		'nama_product',
		'harga',
		'deskripsi',
		'status',
		'img',
		'views'
	);
	 
	public $timestamps = false;
	
	public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
	
	public function getKategori(){
        return $this->belongsTo('App\Category_model', 'id_kategori', 'id');
    }
	 
}
