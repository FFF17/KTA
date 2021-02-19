<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        public function provinsis(){
        return $this->belongsTo('App\Provinsi','provinsi','kode');
    }
    // public function kabupatens(){
    //     return $this->belongsTo('App\Kabupaten','id','kode');
    // }
    // public function kecamatans(){
    //     return $this->belongsTo('App\Kecamatan','id','kode');
    // }
    // public function kelurahans(){
    //     return $this->belongsTo('App\Kelurahan','id','kode');
    // }
}
