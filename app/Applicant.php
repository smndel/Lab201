<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'company', 'phone_number', 'contact', 'mail', 'accepted', 'funded', 'experience', 'career', 'price', 'questionnaire_sent', 'questionnaire_returned', 'funding_id', 'education_level_id',
    ];

    public function education_level(){
        
    	return $this->belongsTo(Education_level::class);
    }

    public function funding(){
      
    	return $this->belongsTo(Funding::class);
    }

    public function comment(){
        
    	return $this->HasOne(Comment::class);
    }

    public function partners(){
        
    	return $this->belongsToMany(Partner::class);
    }

    public function services(){
        
    	return $this->belongsToMany(Service::class);
    }

    public function payment(){
    	return $this->belongsToMany(Payment::class);
    }

    public function testimony(){
        
        return $this->HasOne(Testimony::class);
    }

    public function picture(){
        return $this->hasOne(Picture_applicants::class);
    }
}
