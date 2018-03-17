<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_actualities extends Model
{
     public function actuality(){
   		return $this->belongsTo(Actuality::class);
   }
}
