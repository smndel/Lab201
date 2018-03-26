<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'comments',
	];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
  	}
}
