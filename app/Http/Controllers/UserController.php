<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
class UserController extends Controller
{
    public function index(){
        $user = User::where('level',1)->get();
      
        return view ('datauser.user',['user'=>$user]);
    }

    public function insert_user(Request $user)
    {

        User::Create([
            'name'=> $user['name'],
            'email'=> $user['email'],
            'level'=> '1',
            'password'=> Hash::make($user['password']),
        ]);

        return redirect('user')->with('Status','Data user Berhasil di Simpan');
    }

    public function edit_user(Request $user)
    {
        DB::table('users')->where('id_user', $user['id_user'])->update([
            'name'=> $user['name'],
            'email'=> $user['email'],
            'updated_at'=>now(),
            ]);
            return redirect('user')->with('edit','Data User Berhasil di Edit');
    }

    public function delete_user($id){
        DB::table('users')->where('id_user',$id)->delete();
        return redirect ('user')->with('hapus','Data Berhasil Dihapus');
    }
}
