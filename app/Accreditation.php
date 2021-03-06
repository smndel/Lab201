<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    protected $fillable = [
        'title', 'statut', 'url'
    ];

    public function picture(){

    	return $this->hasOne(Picture_accreditations::class);
    }
}
