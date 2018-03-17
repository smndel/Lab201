<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public function picture(){
    	return $this->hasOne(Picture_partners::class);
    }

    public function applicant(){
   		return $this->belongsToMany(Applicant::class);
   }

   public function Services(){
    	return $this->belongsToMany(Service::class);
	}

}
