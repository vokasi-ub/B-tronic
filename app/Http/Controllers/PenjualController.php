<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use \App\Category_model;
use \App\Product_model;

class PenjualController extends Controller
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
		
    }
	
	public function active($id)
    {	
		
		$data = \Auth::user()->id;	
        $product = Product_model::where('id_user', $data)
							 ->where('status','=','active')
							 ->get();
	    return view('pagePenjual.active', compact('product'));
    }
		
	public function pending($id)
    {	
		
		$data = \Auth::user()->id;	
        $product = Product_model::where('id_user', $data)
							 ->where('status','=','pending')
							 ->get();
		return view('pagePenjual.pending', compact('product'));
    }
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
		$product = Product_model::join('kategori', 'product.id_kategori' ,'=', 'kategori.id')
								 ->join('users', 'product.id_user', '=', 'users.id')
								 ->select('product.*','product.id as key','product.status as sts','product.created_at as crt',
										  'kategori.*','users.*','users.name as nama_user')
								 ->where('product.status', '=' ,'pending')
								 ->get();
								 
        return view('pagePenjual.pengajuan',compact('product'));
    }
	
	public function verifikasi($id){
		
		$id_real = decrypt($id);
		
		$Product = Product_model::find($id_real);
		$Product->status = 'active';
		$Product->save();
		
		return redirect('Pengajuan-product');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
		
		if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/product/', $name);  
                $data[] = $name;  
            }
        }
		
		$Product_model = new Product_model;
		$Product_model->id_kategori = $request->id_kategori;
		$Product_model->id_user = $request->id_user;
		$Product_model->nama_product = $request->nama_product;
		$Product_model->harga = $request->harga;
		$Product_model->deskripsi = $request->deskripsi;
		$Product_model->img = json_encode($data);
		$Product_model->status = 'pending';
		$Product_model->save();
	  
		return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	   $id_real = decrypt($id);
	   $data = Product_model::join('kategori', 'product.id_kategori' ,'=', 'kategori.id')
								 ->join('users', 'product.id_user', '=', 'users.id')
								 ->join('provinces', 'users.id_province', '=', 'provinces.id')
								 ->join('cities', 'users.id_city', '=', 'cities.id')
								 ->join('districts', 'users.id_district', '=', 'districts.id')
								 ->join('villages', 'users.id_village', '=', 'villages.id')
								 ->select('product.*','product.id as key','kategori.*','users.*','provinces.name as provinsi','cities.name as kota','districts.name as kec','villages.name as kel')
								 ->where('product.id', '=' ,[$id_real])
								 ->get();
								 
       return view('pagePenjual.detailproduct', compact('data')); 
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
		$data = $request->id_product;
		$id = encrypt($data);
		
		$Product = Product_model::find($data);
		$Product->nama_product = $request->nama_product;
		$Product->harga = $request->harga;
		$Product->deskripsi = $request->deskripsi;
		$Product->save();
		
		return redirect('detail-product-dashboard/'.$id);
    }
	public function updateimg(Request $request)
    {
		$this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
		
		if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/product/', $name);  
                $data[] = $name;  
            }
        }
		
		$key = $request->id_product;
		$id = encrypt($key);
		
		$Product = Product_model::find($key);
		$Product->img = json_encode($data);
		$Product->save();
		
		return redirect('detail-product-dashboard/'.$id);
    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$id_real = decrypt($id);
		
		$Product = Product_model::find($id_real);
		$Product->delete();
		
		return redirect('user');
    }
}
