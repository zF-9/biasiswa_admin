<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
	protected $fillable = [
		'user_id', 'isApproved'
	];

    public function user() {
    	return $this->belongsTo(User::class);
    }

}
