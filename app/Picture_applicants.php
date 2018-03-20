<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_applicants extends Model
{
    public function applicant(){
   		return $this->belongsTo(Applicant::class);
   	}
}
