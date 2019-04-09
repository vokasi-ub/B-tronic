<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category_model;
use \App\Product_model;
use DB;
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
		$product =  Product_model::with('getKategori')->get();
									
        return view('frontend/index',compact('kategori','product'));
    }
	
	public function product($id)
    {	
		$id_real = decrypt($id);
		$kategori = Category_model::all();
	//	$deskategori = DB::select('Select * from kategori where id =?',[$id_real]);
		$deskategori = Category_model::where('id', $id_real)->get();
		$product = DB::select('select a.*,b.* from product a join kategori b on a.id_kategori = b.id
								where a.id =?',[$id_real]);
		$total_product = DB::select('select count(*)as jumlah from product where id =?',[$id_real]);
								
        return view('frontend/category',compact('kategori','deskategori','product','total_product'));
    }
	
	public function detail($id)	
    {	
		$id_real = decrypt($id);
		$kategori = Category_model::all();
		$product = DB::select('select a.*,b.*,c.*,d.name as provinsi, e.name as kota ,f.name as kec, g.name as kel 
							   from product a join kategori b on a.id_kategori = b.id
											  join users c on a.id_user = c.id
											  join provinces d on c.id_province = d.id
											  join cities e on c.id_city = e.id
											  join districts f on c.id_district = f.id
											  join villages g on c.id_village = g.id
								where a.id =?',[$id_real]);

		 /*	$data = Province_model::with('getUser')
					City_model::with('getUser')
					District_model::with('getUser')
					Village_model::with('getUser')
					->get(); 
		 */
					
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
