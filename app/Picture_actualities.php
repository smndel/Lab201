<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_actualities extends Model
{
	protected $fillable = [
		'link', 'title',
	];
	
     public function actuality(){
     	
   		return $this->belongsTo(Actuality::class);
   }
}
