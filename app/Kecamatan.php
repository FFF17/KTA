<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
     public function user(){
    	return $this->hasMany('App\User','kecamatan');
    }
}
