<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminProfile()
    {
        return view('Admin.ProfilepageAdmin');
    } 
    
    public function AdminDashboard()
    {
        $data_pemohon = DB::table('applicants')->get();

        $deg_p = DB::table('up_documents')->where('AkademikLvl', '=', 'Sarjana Muda')->get();
        $mstr_p = DB::table('up_documents')->where('AkademikLvl', '=', 'Sarjana')->get();
        $phd_p = DB::table('up_documents')->where('AkademikLvl', '=', 'Doktor Falsafah')->get();
    
        return view('Admin.dashboard_admin', ['data_pemohon' => $data_pemohon, 'degree' => $deg_p, 'master' => $mstr_p, 'phd' => $phd_p]);  
    }  

    public function dataPemohon() {
        $data_pemohon = DB::table('applicants')->get();
        $data_student = DB::table('up_documents')->get();
    
        return view('Admin.table_pemohon', ['data_pemohon' => $data_pemohon, 'data_student' => $data_student]); 
    }

    public function dataPelajar() {
        $data_pemohon = DB::table('applicants')->where('isApproved', '=', 1)->get();
        $data_student = DB::table('up_documents')->get();

        return view('Admin.table_pelajar', ['data_pemohon' => $data_pemohon, 'data_student' => $data_student]); 
    }

    public function payment_record() {
        $payments = DB::table('payment_records')->get();

        return view('Admin.record_pmbyrn', ['payment' => $payments]);   
    }

    public function update_payment() {
        $new_record = new payment_records;

        $new_record-> date_pymnt = request('date');
        $new_record-> No_baucer = request('baucer_no');
        $new_record-> Amount = request('jumlah');
        $new_record-> jenis_pymnt = request('perkara');

        $new_record->save();

        return Redirect::back();
    }    

}
