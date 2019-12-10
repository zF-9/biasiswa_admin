<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_record extends Model
{
	protected $fillable = [];
    //link dari applicant punya database
    public function payment_INFO() {
    	return $this->belongsTo(User::class);
    }
}
