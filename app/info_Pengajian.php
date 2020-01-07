<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class info_Pengajian extends Model
{
	protected $fillable = [];
    //link dari applicant punya database
    public function applicant() {
    	return $this->belongsTo(User::class);
    }
}
