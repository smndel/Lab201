<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
     public function Applicant(){
   		return $this->belongsTo(Applicant::class);
   }
}
