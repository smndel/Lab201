<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable = [
		'testimony', 'applicant_id',
	];

	public function applicant(){
   		return $this->belongsTo(Applicant::class);
   }

   public function picture(){
   		return $this->belongsTo(Applicant::class);
   }

}
