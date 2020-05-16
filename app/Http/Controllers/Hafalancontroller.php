<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hafalan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Santri;
use App\Ortu;
use App\Target;
use App\Surah;
use PDF;

class Hafalancontroller extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->middleware('auth');
        $this->middleware('rule:Admin');
    }

    public function index(Request $request){
        if ($request->has('cari')) {
            $santri = DB::table('tb_santri')
            ->where('nidn_santri','like',"%".$request->cari."%")
            ->orwhere('nama_santri','like',"%".$request->cari."%")
            ->get();
        }else{
            $santri = Santri::all();
        }
        
        return view ('hafalan.hafalan',['santri'=>$santri]);
    }

    public function cari(Request $data){
        echo "cari";
        // $cari = $data['cari'];
        // $santri = DB::table('tb_santri')
        // ->where('nidn_santri','like',"%".$cari."%")
        // ->orwhere('nama_santri','like',"%".$cari."%")
        // ->paginate();
        // dump($santri);

        // return view ('hafalan.hafalan',['santri'=>$santri]);
    }

    public function detail($id){
        $santri = Santri::where('id_santri',$id)->first();
        $hafalan = Hafalan::where('id_Santri',$id)->get();
        $pertama=0;
        $kedua=0;
        $ketiga=0;
        foreach ($hafalan as $haf) {
            if($haf->ket_hafalan == "Pekan Pertama"){
                $pertama+=1;
            }else if($haf->ket_hafalan == "Pekan Kedua"){
                $kedua+=1;
            }else if($haf->ket_hafalan == "Pekan Ketiga"){
                $ketiga+=1;
            }
        }

        return view ('hafalan.detail_hafalan',['pertama'=>$pertama,'kedua'=>$kedua,'ketiga'=>$ketiga,'santri'=>$santri,'hafalan'=>$hafalan]);
    }

    public function tercapai(Request $data){

        DB::table('tb_hafalan')->where('id_hafalan', $data['id_hafalan'])->update([
            'tajwid'=> $data['tajwid'],
            'ket_hafalan'=> $data['ket_hafalan'],
            'status_hafalan'=> 'Tercapai',
            'waktu_hafalan'=>now(),
            'updated_at'=>now(),
            ]);
        $santri = Santri::where('id_santri',$data['id_santri'])->first();
        $hafalan = Hafalan::where('id_Santri',$data['id_santri'])->get();
        return view ('hafalan.detail_hafalan',['santri'=>$santri,'hafalan'=>$hafalan]);
    }

    public function Cetak_PerSantri($id){
        $santri = Santri::where('id_santri',$id)->first();
        $hafalan = Hafalan::where('id_Santri',$id)->get();

        $pdf = PDF::loadview('hafalan.laporan_persantri',['santri'=>$santri,'hafalan'=>$hafalan]);
        return $pdf->stream();
    }

    public function Cetak_DataSantri(){
        $santri = Santri::all();

        $pdf = PDF::loadview('hafalan.laporan_data_santri',['santri'=>$santri]);
        return $pdf->stream();
    }

}
