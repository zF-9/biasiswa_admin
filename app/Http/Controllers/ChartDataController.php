<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\applicant;
use App\upDocuments;
use App\payment_record;
use Illuminate\Http\Request;

class ChartDataController extends Controller
{
    
    public function Getthejumlah()
    {
        $Jan = DB::table('payment_records')
        ->where('date_pymnt', '=', '1')
        ->sum('Amount');
    

        return view('Admin.dashboard_admin', ['Jan' => $Jan]);  
    } 
    
}
