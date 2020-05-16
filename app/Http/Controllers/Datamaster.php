<?php

namespace App\Http\Controllers;

use App\Hafalan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Santri;
use App\User;
use App\Ortu;
use App\Target;
use App\Surah;

class Datamaster extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->middleware('auth');
        $this->middleware('rule:Admin');
    }

    // target
    public function target()
    {
        $surah = Surah::all();
        $target = Target::all();
        return view('datamaster.target',['target'=>$target,'surah'=>$surah]);
    }
    public function insert_target(Request $target)
    {
        
       Target::Create([
                'id_surah' => $target['surah'],
                'ayat'=> $target['ayat'],
        ]);
        $id_target= DB::table('tb_target')->max('id_target');
        $santri=Santri::all();
        foreach($santri as $sar){
            Hafalan::Create([
                'waktu_hafalan' => now(),
                'id_user'=> Auth::user()->id_user,
                'id_santri'=> $sar->id_santri,
                'id_surah'=> $target['surah'],
                'id_target'=> $id_target,
                'tajwid'=> 'Cukup',
                'ket_hafalan'=>'Pekan Pertama',
                'status_hafalan'=> 'Belum tercapai',
            ]);
        }
        
        return redirect('target')->with('Status','Data Target Berhasil di Simpan');
    }
    public function edit_target(Request $target)
    {
        if ($target['id_surah']==null) {
            DB::table('tb_target')->where('id_target', $target['id_target'])->update([
                'ayat'=> $target['ayat'],
                'updated_at'=>now(),
                ]);
        } else {
            DB::table('tb_target')->where('id_target', $target['id_target'])->update([
                'id_surah'=> $target['surah'],
                'ayat'=> $target['ayat'],
                'updated_at'=>now(),
                ]);
        }
        return redirect('target')->with('edit','Data Target Berhasil di Edit');
    }
    public function delete_target($id){
        DB::table('tb_target')->where('id_target',$id)->delete();
        return redirect ('target')->with('hapus','Data Berhasil Dihapus');
    }

    // ortu
    public function ortu()
    {
        $ortu = Ortu::all();
        return view('datamaster.ortu',['ortu'=>$ortu]);
    }
    public function insert_ortu(Request $ortu)
    {
            $id_santri = Santri::where('nidn_santri',$ortu['nidn'])->value('id_santri');
       Ortu::Create([
            'id_santri'=> $id_santri,
            'nama_ayah'=> $ortu['nama_ayah'],
            'nama_ibu'=> $ortu['nama_ibu'],
            'pekerjaan_ortu'=> $ortu['kerja_ortu'],
            'alamat_ortu'=> $ortu['alamat'],
        ]);

        User::Create([
            'name'=> $ortu['nidn'],
            'email'=> 'miftahunnajah@gmail.com',
            'level'=> '2',
            'password'=> Hash::make($ortu['nidn']),
        ]);

        return redirect('ortu')->with('Status','Data Ortu Berhasil di Simpan');
    }
    public function edit_ortu(Request $ortu)
    {
        $id_santri = Santri::where('nidn_santri',$ortu['nidn'])->value('id_santri');
        DB::table('tb_ortu')->where('id_ortu', $ortu['id_ortu'])->update([
            'id_santri'=> $id_santri,
            'nama_ayah'=> $ortu['nama_ayah'],
            'nama_ibu'=> $ortu['nama_ibu'],
            'pekerjaan_ortu'=> $ortu['kerja_ortu'],
            'alamat_ortu'=> $ortu['alamat'],
            'updated_at'=>now(),
            ]);
            return redirect('ortu')->with('edit','Data Ortu Berhasil di Edit');
    }
    public function delete_ortu($id){
        DB::table('tb_ortu')->where('id_ortu',$id)->delete();
        return redirect ('ortu')->with('hapus','Data Berhasil Dihapus');
    }
    
    // santri
    public function santri()
    {
        $santri = Santri::all();
        return view('datamaster.santri',['santri'=>$santri]);
    }

    public function insert_santri(Request $santri)
    {
        $file = $santri->file('foto');
        $tujuan_upload = 'img';
        $file->move($tujuan_upload,$file->getClientOriginalName());
        Santri::Create([
            'nidn_santri' => $santri['nidn'],
            'nama_santri' => $santri['nama'],
            'tempat_lahir_santri' => $santri['tempat_lahir'],
            'tanggal_lahir_santri' => $santri['tanggal_lahir'],
            'jenis_kelamin_santri' => $santri['jk'],
            'alamat_santri' => $santri['alamat'],
            'kelas_santri' => $santri['kelas'],
            'foto' => $file->getClientOriginalName(),
            'status_santri' => $santri['status'],
        ]);
        
        $id_santri= DB::table('tb_santri')->max('id_santri');
        $target=Target::all();
        foreach($target as $tar){
            Hafalan::Create([
                'waktu_hafalan' => now(),
                'id_user'=> Auth::user()->id_user,
                'id_santri'=> $id_santri,
                'id_surah'=> $tar['id_surah'],
                'id_target'=> $tar['id_target'],
                'tajwid'=> 'Cukup',
                'ket_hafalan'=>'Pekan Pertama',
                'status_hafalan'=> 'Belum tercapai',
            ]);
        }
        return redirect('santri')->with('Status','Data Santri Berhasil di Simpan');
    }

    public function edit_santri(Request $santri)
    {
        DB::table('tb_santri')->where('id_santri', $santri['id_santri'])->update([
            'nidn_santri' => $santri['nidn'],
            'nama_santri' => $santri['nama'],
            'tempat_lahir_santri' => $santri['tempat_lahir'],
            'tanggal_lahir_santri' => $santri['tanggal_lahir'],
            'jenis_kelamin_santri' => $santri['jk'],
            'alamat_santri' => $santri['alamat'],
            'kelas_santri' => $santri['kelas'],
            'status_santri' => $santri['status'],
            'updated_at'=>now(),
            ]);
            return redirect('santri')->with('edit','Data Santri Berhasil di Edit');
    }
    public function delete_santri($id){
        DB::table('tb_santri')->where('id_santri',$id)->delete();
        return redirect ('santri')->with('hapus','Data Berhasil Dihapus');
    }
}
