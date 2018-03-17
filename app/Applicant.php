<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
     public function education_level(){
        
    	return $this->belongsTo(Education_level::class);
    }

    public function funding(){
      
    	return $this->belongsTo(Funding::class);
    }

    public function comment(){
        
    	return $this->HasOne(Comment::class);
    }

    public function partner(){
        
    	return $this->belongsToMany(Partner::class);
    }

    public function services(){
        
    	return $this->belongsToMany(Service::class);
    }

    public function payment(){
    	return $this->belongsToMany(Payment::class);
    }
}
