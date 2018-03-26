<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
     public function applicant(){
     	
   		return $this->belongsTo(Applicant::class);
   }
}
