<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_services extends Model
{
     public function services(){
   		return $this->belongsToMany(Service::class);
   }
}
