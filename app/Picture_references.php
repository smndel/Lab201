<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture_references extends Model
{
    protected $fillable = [
		'link', 'title',
	];

	public function reference(){
		
   		return $this->belongsTo(Reference::class);
   }
}
