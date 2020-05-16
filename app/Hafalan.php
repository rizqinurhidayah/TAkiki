<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    protected $table='tb_hafalan';
    protected $fillable=[
        'waktu_hafalan',
        'id_user',
        'id_santri',
        'id_target',
        'id_surah',
        'tajwid',
        'ket_hafalan',
        'status_hafalan'
    ];
    public function user(){
        return $this->hasMany('App\User','id_user');
    }
    public function hafalan(){
        return $this->belongsTo(Santri::class,'id_santri');
    }
    public function surah_hafalan(){
        return $this->belongsTo(Surah::class,'id_surah');
    }
    public function target_hafalan(){
        return $this->belongsTo(Target::class,'id_target');
    }
}
