<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function intervenants(){
    	return $this->belongsToMany(Intervenant::class);
    }

    public function picture(){

    	return $this->hasOne(Picture_services::class);
    }

    public function applicants(){
    	return $this->belongsToMany(Applicant::class);
    }
}
