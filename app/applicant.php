<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
	protected $fillable = [
		'user_id',
	];
    //link dari user punya database
    public function user() {
    	return $this->belongsTo(User::class);
    }

}
