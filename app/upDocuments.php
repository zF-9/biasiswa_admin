<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upDocuments extends Model
{
	protected $fillable = [];
    //link dari applicant punya database
    public function applicant() {
    	return $this->belongsTo(User::class);
    }

}
