<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_partners extends Model
{
	protected $fillable = [
		'link', 'title',
	];
	
     public function partner(){
     	
   		return $this->belongsTo(Partner::class);
   }
}
