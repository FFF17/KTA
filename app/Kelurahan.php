<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    
	 public function user(){
    	return $this->hasMany('App\User','kelurahan');
    }

    }
