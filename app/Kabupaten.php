<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    public function user(){
    	return $this->hasMany('App\User','kabupaten');
    }
}
