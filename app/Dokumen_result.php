<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen_result extends Model
{
	protected $fillable = [];
    //link dari applicant punya database
    public function user_dokumen() {
    	return $this->belongsTo(User::class);
    }
}
