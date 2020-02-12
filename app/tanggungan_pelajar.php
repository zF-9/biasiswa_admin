<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tanggungan_pelajar extends Model
{
    protected $fillable = [];
    //link dari applicant punya database
    public function applicant() {
    	return $this->belongsTo(User::class);
    }
}
