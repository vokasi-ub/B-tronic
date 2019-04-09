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
        
    }
	
	public function getCity($id) 
	{        
        $city = DB::table("cities")->where("province_id",$id)->pluck("name","id");
        return json_encode($city);
	}
	public function getKec($id) 
	{        
        $kec = DB::table("districts")->where("city_id",$id)->pluck("name","id");
        return json_encode($kec);
	}
	public function getKel($id) 
	{        
        $kel = DB::table("villages")->where("district_id",$id)->pluck("name","id");
        return json_encode($kel);
	}

}
