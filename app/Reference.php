<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'company', 'statut'
    ];

    public function picture(){

    	return $this->hasOne(Picture_references::class);
    }
}
