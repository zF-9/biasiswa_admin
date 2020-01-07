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
        $data_pemohon = DB::table('applicants')->count();

        $deg_ap = DB::table('up_documents')->where('AppliedKursus', '=', 'Sarjana Muda')->get();
        $mstr_ap = DB::table('up_documents')->where('AppliedKursus', '=', 'Sarjana')->get();
        $phd_ap = DB::table('up_documents')->where('AppliedKursus', '=', 'Doktor Falsafah')->get();

        $data_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->count();

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

        $Jan = DB::table('payment_records')
        ->where('date_pymnt', '=', '1')
        ->sum('Amount');
    
        $Feb = DB::table('payment_records')
        ->where('date_pymnt', '=', '2')
        ->sum('Amount');

        $Mar = DB::table('payment_records')
        ->where('date_pymnt', '=', '3')
        ->sum('Amount');

        $Apr = DB::table('payment_records')
        ->where('date_pymnt', '=', '4')
        ->sum('Amount');

        $May = DB::table('payment_records')
        ->where('date_pymnt', '=', '5')
        ->sum('Amount');

        $Jun = DB::table('payment_records')
        ->where('date_pymnt', '=', '6')
        ->sum('Amount');

        $Jul = DB::table('payment_records')
        ->where('date_pymnt', '=', '7')
        ->sum('Amount');
        
        $Aug = DB::table('payment_records')
        ->where('date_pymnt', '=', '8')
        ->sum('Amount');
    
        $Sep = DB::table('payment_records')
        ->where('date_pymnt', '=', '9')
        ->sum('Amount');

        $Oct = DB::table('payment_records')
        ->where('date_pymnt', '=', '10')
        ->sum('Amount');

        $Nov = DB::table('payment_records')
        ->where('date_pymnt', '=', '11')
        ->sum('Amount');

        $Dis = DB::table('payment_records')
        ->where('date_pymnt', '=', '12')
        ->sum('Amount');


        return view('Admin.dashboard_admin', ['Jan' => $Jan, 'Feb' => $Feb, 'Mar' => $Mar, 'Apr' => $Apr, 'May' => $May, 'Jun' => $Jun,
         'Jul' => $Jul, 'Aug' => $Aug, 'Sep' => $Sep, 'Oct' => $Oct, 'Nov' => $Nov, 'Dis' => $Dis, 'data_pemohon' => $data_pemohon,
          'data_student' => $data_student, 'degree' => $deg_ap, 'degreeapp' => $deg_p, 'master' => $mstr_ap, 'masterapp' => $mstr_p, 'phd' => $phd_ap, 'phdapp' => $phd_p]);  


        $count_36 = applicant::where('Gred', '=', '36')->count();
        $count_41 = applicant::where('Gred', '=', '41')->count();
        $count_44 = applicant::where('Gred', '=', '44')->count();
        $count_48 = applicant::where('Gred', '=', '48')->count();

        $payment = DB::table('payment_records')->get(['date_pymnt', 'Amount']);

        return view('Admin.dashboard_admin', ['data_pemohon' => $data_pemohon, 'data_student' => $data_student, 'degree' => $deg_ap, 'degreeapp' => $deg_p, 'master' => $mstr_ap, 'masterapp' => $mstr_p, 'phd' => $phd_ap, 'phdapp' => $phd_p, 'c36' => $count_36, 'c41' => $count_41, 'c44' => $count_44, 'c48' => $count_48, 'pembayaran' => $payment]); 

    } 

    public function dataPemohon() {
        //$data_pemohon = DB::table('applicants')->get();
        //$data_student = DB::table('up_documents')->get();
    
        $data_pemohon = DB::table('applicants')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->get();

        return view('Admin.table_pemohon', ['data_pemohon' => $data_pemohon]); 
    }

    public function dataPelajar() {
        $data_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('up_documents', 'up_documents.applicant_id', 'applicants.user_id')
        ->get();
        //$data_student = DB::table('up_documents')->get();

        return view('Admin.table_pelajar', ['data_student' => $data_student]); 
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

    public function ApprovePelajar(User $user) {
        //$var = request('data_id');
        //$user->name();
        //$data_user = request('data_id');
        dd($user);
    }   

}
