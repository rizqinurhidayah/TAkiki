<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','level',
    ];
    protected $primaryKey = 'id_user';
    
    public function hafalan(){
        return $this->belongsTo('App\Hafalan','id_hafalan');
    }

    public function role(){
        return $this->belongsTo(Role::class,'level');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function punyaRule($namaRule){
        if($this->role->namaRule == $namaRule){
            return true;
        }
        return false;
    }
}
