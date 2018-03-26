<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
	protected $fillable = [
        'title', 'description', 'statut'
    ];

    public function picture(){

    	return $this->hasOne(Picture_actualities::class);
    }
}
