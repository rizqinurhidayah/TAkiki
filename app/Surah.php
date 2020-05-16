<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    protected $table='tb_surah';
    protected $fillable=[
        'nama_surah',
        'jmlh_ayat'
    ];
    protected $primaryKey = 'id_surah';
    public function hafalan(){
        return $this->belongsTo('App\Hafalan','id_hafalan');
    }

    public function surah(){
        return $this->hasOne(Target::class,'id_surah');
    }   

    public function surah_hafalan(){
        return $this->hasOne(Surah::class,'id_surah');
    }
    
}
