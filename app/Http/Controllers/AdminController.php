<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\User;
use App\applicant;
use App\upDocuments;
use App\payment_record;
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

        $deg_ap = DB::table('up_documents')->where('AppliedKursus', '=', 'Sarjana Muda')->get();
        $mstr_ap = DB::table('up_documents')->where('AppliedKursus', '=', 'Sarjana')->get();
        $phd_ap = DB::table('up_documents')->where('AppliedKursus', '=', 'Doktor Falsafah')->get();

        $data_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->get();

        $deg_p = DB::table('applicants')->where('isApproved', '=', '1')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->get();

        $mstr_p = DB::table('applicants')->where('isApproved', '=', '1')
        ->where('AppliedKursus', '=', 'Sarjana')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->get();

        $phd_p = DB::table('applicants')->where('isApproved', '=', '1')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->get();
    

        return view('Admin.dashboard_admin', ['data_pemohon' => $data_pemohon, 'data_student' => $data_student, 'degree' => $deg_ap, 'degreeapp' => $deg_p, 'master' => $mstr_ap, 'masterapp' => $mstr_p, 'phd' => $phd_ap, 'phdapp' => $phd_p]);  
    } 
    
   

    public function dataPemohon() {
        $data_pemohon = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->get();

        return view('Admin.table_pemohon', ['data_pemohon' => $data_pemohon]); 
    }

    public function dataPelajar() {
        $data_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->get();

        return view('Admin.table_pelajar', ['data_student' => $data_student]); 
    }

    public function payment_record($id) {
        //dd($id);
        $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();

        return view('Admin.record_pmbyrn', ['id' => $id, 'payment' => $payments]);   
    }

    public function update_payment($id) {
        $new_record = new payment_record;

        $new_record-> date_pymnt = request('date');
        $new_record-> No_baucer = request('baucer_no');
        $new_record-> Amount = request('jumlah');
        $new_record-> jenis_pymnt = request('perkara');
        $new_record-> payment_id = $id;

        $new_record->save();

        return Redirect::back();
    } 

    public function approve_pelajar($id) {
        applicant::where('user_id', '=', $id)->update([
            'isApproved'=>true
        ]);

        return Redirect()->route('table_pemohon');     
    }

    public function profile_view($name) {
        $user_profile = applicant::where('nama', '=', $name)->first();
        return view('Admin.profileViewer', ['user_profile' => $user_profile]);
    }

    public function ApprovePelajar(User $user) {
        dd($user);
    }   

}
