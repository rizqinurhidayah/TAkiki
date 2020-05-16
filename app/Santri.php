<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table='tb_santri';
    protected $fillable=[
        'nidn_santri',
        'nama_santri',
        'tempat_lahir_santri',
        'tanggal_lahir_santri',
        'jenis_kelamin_santri',
        'alamat_santri',
        'kelas_santri',
        'foto',
        'status_santri'
    ];
    
    protected $primaryKey = 'id_santri';
    
    public function Ortu(){
        return $this->hasOne(Ortu::class,'id_santri');
    }

    public function Santri(){
        return $this->hasOne(Ortu::class,'id_santri');
    }

    public function hafalan(){
        return $this->hasMany(Hafalan::class,'id_santri');
    }
}
