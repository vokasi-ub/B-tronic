<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category_model;
use \App\Product_model;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		
		$kategori =  Category_model::all();
		$product =  Product_model::with('getKategori')->where('status', '!=', 'pending')->get();
									
        return view('frontend/index',compact('kategori','product'));
    }
	
	public function product($id)
    {	
		$id_real = decrypt($id);
		$kategori = Category_model::all();
		$deskategori = Category_model::where('id', $id_real)->get();
		$product = Product_model::with('getKategori')->where('status', '!=', 'pending')
													 ->where('id_kategori', '=' ,$id_real)
													 ->get();
		$total_product = Product_model::where('status', '!=', 'pending')
										 ->where('id_kategori', '=' ,$id_real)
										 ->count('*');
		
        return view('frontend/category',compact('kategori','deskategori','product','total_product'));
    }
	
	public function detail($id)	
    {	
		$id_real = decrypt($id);
		$kategori = Category_model::all();
		$product =  Product_model::join('kategori', 'product.id_kategori' ,'=', 'kategori.id')
								 ->join('users', 'product.id_user', '=', 'users.id')
								 ->join('provinces', 'users.id_province', '=', 'provinces.id')
								 ->join('cities', 'users.id_city', '=', 'cities.id')
								 ->join('districts', 'users.id_district', '=', 'districts.id')
								 ->join('villages', 'users.id_village', '=', 'villages.id')
								 ->select('product.*','kategori.*','users.*','provinces.name as provinsi','cities.name as kota','districts.name as kec','villages.name as kel')
								 ->where('product.id', '=' ,[$id_real])
								 ->where('product.status', '!=' ,'pending')
								 ->get();
					
        return view('frontend/detail-product',compact('kategori','product'));
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
