<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use \App\Product_model;
use \App\Category_model;
use \App\Province_model;
use \App\City_model;
use \App\District_model;
use \App\Village_model;

class UsersController extends Controller
{
	
	public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$tgl = date('d-M-Y');
		$id = \Auth::user()->id;
		
				$provinsi = \Auth::user()->id_province;	
				$kota = \Auth::user()->id_city;	
				$alamat = \Auth::user()->address;	
				$foto = \Auth::user()->foto;	
				$gender = \Auth::user()->gender;	
				$telp = \Auth::user()->telp;
					
				$kategori = Category_model::all();
				$province = Province_model::all();
				$product_on = Product_model::with('getKategori')->where('id_user', '=',[$id])
																 ->where('status','=','active')
																 ->get();
				$product_off = Product_model::with('getKategori')->where('id_user', '=',[$id])
																 ->where('status','=','pending')
																 ->get();
	
				$active_product =  Product_model::where('status', '=' ,'active')
												->where('id_user', '=' ,$id)
												->count('*');
						  
				$pending_product = Product_model::where('status', '=' ,'pending')
												->where('id_user', '=' ,$id)
												->count('*');
					
				if ($provinsi == null || $kota == null || $alamat == null || $foto == null || $gender == null || $telp == null){
					$biodata = '20%';
					$notif = session()->flash('warning', 'Silahkan lengkapi Biodata anda terlebih dahulu !');
					return view('pageBiodata.user-biodata', compact('province','active_product','pending_product','tgl','biodata','notif'));
				}else {
					$notif = session()->flash('success', '');
					$biodata = '100%';
					return view('home-user', compact('kategori','active_product','pending_product','tgl','biodata','notif','product_on','product_off'));
				}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
