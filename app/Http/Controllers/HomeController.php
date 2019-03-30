<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$data = \Auth::user()->status;
			if ($data == 'admin'){
				return view('home-admin');
			}
			else{
				$tgl = date('d-M-Y');
				$id = \Auth::user()->id;
				
				$provinsi = \Auth::user()->id_province;	
				$kota = \Auth::user()->id_city;	
				$alamat = \Auth::user()->address;	
				$foto = \Auth::user()->foto;	
				$gender = \Auth::user()->gender;	
				$telp = \Auth::user()->telp;	
				
				$kategori = DB::select('select * from kategori');
				$product = DB::select('select * from product where id_user =?',[$id]);
				$active_product = DB::select('select count(*)as active from product where status="active" and id_user =?',[$id]);
				$pending_product = DB::select('select count(*)as pending from product where status="pending" and id_user =?',[$id]);
					
				if ($provinsi == null || $kota == null || $alamat == null || $foto == null || $gender == null || $telp == null){
					$biodata = '20%';
					$notif = session()->flash('warning', 'Silahkan lengkapi Biodata anda terlebih dahulu !');
					return view('home-user', compact('kategori','product','active_product','pending_product','tgl','biodata','notif'));
				}else {
					$notif = session()->flash('success', '');
					$biodata = '100%';
					return view('home-user', compact('kategori','product','active_product','pending_product','tgl','biodata','notif'));
				}
				
			}
        
    }
}
