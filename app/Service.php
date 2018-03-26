<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $fillable = [
        'title', 'description', 'type', 'category',
    ];

    public function partners(){
    	return $this->belongsToMany(Partner::class);
    }

    public function picture(){

    	return $this->hasOne(Picture_services::class);
    }

    public function applicants(){

    	return $this->belongsToMany(Applicant::class);
    }
}
