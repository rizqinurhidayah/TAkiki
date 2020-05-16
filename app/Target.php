<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $table='tb_target';
    protected $fillable=[
        'id_surah',
        'ayat'
    ];
    
    protected $primaryKey = 'id_target';
    public function surah(){
        return $this->belongsTo(Surah::class,'id_surah');
    }
    public function target_hafalan(){
        return $this->hasMany(Target::class,'id_target');
    }
}
