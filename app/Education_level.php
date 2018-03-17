<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education_level extends Model
{
   public function Applicants(){
   		return $this->belongsToMany(Applicant::class);
   }
}
