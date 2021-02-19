<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
 public function user(){
    	return $this->HasMany('App\User');
    }
}
