<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_record extends Model
{
	protected $fillable = [];

    public function payment() {
    	return $this->belongsTo(User::class);
    }
}
