<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_partners extends Model
{
     public function partner(){
   		return $this->belongsTo(Partner::class);
   }
}
