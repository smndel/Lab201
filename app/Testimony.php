<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable = [
		'testimony', 'applicant_id', 'statut'
	];

	public function applicant(){
   		return $this->belongsTo(Applicant::class);
   }

   public function picture(){
   		return $this->hasOne(Picture_testimonies::class);
   }

}
