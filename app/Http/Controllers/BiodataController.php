<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use DB;

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
        $request->file('foto')->move("/image/user/", $fileName);
		
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'id_province' => $request->province,
            'id_city' => $request->city,
            'id_district' => $request->kec,
            'id_village' => $request->kel,
            'address' => $request->address,
            'telp' => $request->telp,
			'foto' => $fileName
		]);	
		
		return redirect('home');
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
