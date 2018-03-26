<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_accreditations extends Model
{
    protected $fillable = [
		'link', 'title',
	];
	
     public function accreditation(){
     	
   		return $this->belongsTo(Accreditation::class);
   }
}
