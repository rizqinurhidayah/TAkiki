<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    protected $table='tb_ortu';
    protected $fillable=[
        'id_santri',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ortu',
        'alamat_ortu'
    ];
    public function Ortu(){
        return $this->belongsTo(Santri::class,'id_hafalan');
    }

    public function Santri(){
        return $this->belongsTo(Santri::class,'id_santri');
    }
}
