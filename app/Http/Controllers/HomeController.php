<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        // $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        $data_santri= DB::table('tb_santri')->count('id_santri');
        $data_admin= DB::table('users')->where('level',1)->count('level');
        $data_target= DB::table('tb_target')->count('id_target');
        return view('home',['data_santri'=>$data_santri,'data_admin'=>$data_admin,'data_target'=>$data_target]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
}
