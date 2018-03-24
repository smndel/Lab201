<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'value','start_date','end_date', 'applicant_id'];

    public function applicant(){
    	
   		return $this->belongsTo(Applicant::class);
   }

}
