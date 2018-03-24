<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_services extends Model
{
	protected $fillable = [
		'link', 'title',
	];
	
     public function services(){
     	
   		return $this->belongsToMany(Service::class);
   }
}
