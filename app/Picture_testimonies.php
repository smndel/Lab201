<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_testimonies extends Model
{
    protected $fillable = [
		'link', 'title',
	];
	
     public function partner(){
   		return $this->belongsTo(Testimony::class);
   }
}
