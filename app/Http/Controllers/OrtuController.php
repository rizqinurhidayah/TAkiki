<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Santri;
use App\User;
use App\Ortu;
use App\Hafalan;
use App\Surah;

class OrtuController extends Controller
{
    public function index(){
        $id = DB::table('tb_santri')->where('nidn_santri',Auth::user()->name)->first();
        $santri = Santri::where('id_santri',$id->id_santri)->first();
        $hafalan = Hafalan::where('id_Santri',$id->id_santri)->get();
        return view ('hafalan.detail_hafalan',['santri'=>$santri,'hafalan'=>$hafalan]);
    }
}
