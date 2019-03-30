<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use DB;

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
		$data = \Auth::user()->id;		
        $kategori = DB::select('select * from kategori');
        $product = DB::select('select * from product where id_user =?',[$data]);
		return view('pagePenjual.index', compact('kategori','product'));
    }
	
	public function active()
    {	
		
		$data = \Auth::user()->id;	
        $product = DB::select('select * from product where status="active" and id_user =?',[$data]);
	    return view('pagePenjual.active', compact('product'));
    }
		
	public function pending()
    {	
		$data = \Auth::user()->id;	
        $product = DB::select('select * from product where status="pending" and id_user =?',[$data]);
		return view('pagePenjual.pending', compact('product'));
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
		$this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
		
		if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
        }
		
       $id = 'ID-'.date('his');
       DB::table('product')->insert([
		'id_product' => $id,
		'id_kategori' => $request->id_kategori,
        'id_user' => $request->id_user,
        'nama_product' => $request->nama_product,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
		'img' => json_encode($data),
        'status' => 'pending'
		]);
	  
		return redirect('home');
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
        $data = DB::select('select * from product where id_product =?', [$id]);
		return view('pageproduct.editproduct', compact('data'));
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
        DB::table('product')->where('id_product',$id)->update([
            'id_kategori' => $request->id_kategori,
            'email_user' => $request->email_user,
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status
		]);		
		return redirect('product');
    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product')->where('id_product',$id)->delete();
		return redirect('product');
    }
}
