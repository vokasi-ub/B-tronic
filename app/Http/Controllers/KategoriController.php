<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use DB;

class KategoriController extends Controller
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
        $kategori = DB::select('select * from kategori order by id_kategori asc');
		return view('pageKategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $id = 'ID-'.substr(strtoupper($request->kategori),0,3).date('is');
       DB::table('kategori')->insert([
		'id_kategori' => $id,
		'kategori' => $request->kategori,
		'description' => $request->description
	  ]);
	  
		return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::select('select * from kategori where id_kategori =?', [$id]);
		    return view('pageKategori.editKategori', compact('data'));
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
        DB::table('kategori')->where('id_kategori',$id)->update([
		'kategori' => $request->kategori,
		'description' => $request->description
		]);		
		return redirect('kategori');
    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kategori')->where('id_kategori',$id)->delete();
		return redirect('kategori');
    }
}
