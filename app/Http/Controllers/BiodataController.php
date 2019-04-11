<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use \App\User;
use \App\Product_model;
use \App\Category_model;
use \App\Province_model;
use \App\City_model;
use \App\District_model;
use \App\Village_model;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
       
    }
	
	public function biodata($id){
        $id_Real= decrypt($id);
																		 
		$data_lokasi = User::join('provinces', 'users.id_province', '=', 'provinces.id')
								 ->join('cities', 'users.id_city', '=', 'cities.id')
								 ->join('districts', 'users.id_district', '=', 'districts.id')
								 ->join('villages', 'users.id_village', '=', 'villages.id')
								 ->select('users.*','provinces.name as provinsi','cities.name as kota','districts.name as kec','villages.name as kel')
								 ->where('users.id', '=' ,[$id_Real])
								 ->get();
								 
        $province = Province_model::all();
		return view('pageBiodata.user-biodata-id', compact('data_lokasi','province'));
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
    public function update(Request $request)
    {	
		$id = \Auth::user()->id;	
		
		$file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $request->file('foto')->move("images/user/", $fileName);
		
		
		$bio = User::find($id);
		$bio->name = $request->name;
		$bio->gender = $request->gender;
		$bio->id_province = $request->province;
		$bio->id_city = $request->city;
		$bio->id_district = $request->kec;
		$bio->id_village = $request->kel;
		$bio->address = $request->address;
		$bio->telp = $request->telp;
		$bio->foto = $fileName;
		$bio->save();
		
		return redirect('user');
    }

    public function update2(Request $request)
    {	
		$id = \Auth::user()->id;	
        $id_ect =  encrypt($id);
		
		
		$bio = User::find($id);
		$bio->name = $request->name;
		$bio->gender = $request->gender;
		$bio->id_province = $request->province;
		$bio->id_city = $request->city;
		$bio->id_district = $request->kec;
		$bio->id_village = $request->kel;
		$bio->address = $request->address;
		$bio->telp = $request->telp;
		$bio->save();
		
		return redirect('Biodata/'.$id_ect);
    }
    
    public function updateImg(Request $request)
    {	
		$id = \Auth::user()->id;	
		$enc = encrypt($id);
		
		$file       = $request->file('foto');
        $fileName   = $file->getClientOriginalName();
        $request->file('foto')->move("images/user/", $fileName);
		
		$Bio = User::find($id);
		$Bio->foto = $fileName;
		$Bio->save();
		
		return redirect('Biodata/'.$enc);
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
