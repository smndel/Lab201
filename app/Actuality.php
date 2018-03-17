<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    public function picture(){

    	return $this->hasOne(Picture_actualities::class);
    }
}
