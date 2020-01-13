<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use Storage;
use App\User;
use App\applicant;
use App\Dokumen_result;
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
        $data_pemohon = DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->count();

        $deg_ap = DB::table('info__pengajians')->where('AppliedKursus', '=', 'Sarjana Muda')->get();
        $mstr_ap = DB::table('info__pengajians')->where('AppliedKursus', '=', 'Sarjana')->get();
        $phd_ap = DB::table('info__pengajians')->where('AppliedKursus', '=', 'Doktor Falsafah')->get();

        $data_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->count();

        $deg_p = DB::table('applicants')->where('isApproved', '=', '1')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();

        $mstr_p = DB::table('applicants')->where('isApproved', '=', '1')
        ->where('AppliedKursus', '=', 'Sarjana')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();

        $phd_p = DB::table('applicants')->where('isApproved', '=', '1')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();

        $count_36 = applicant::where('Gred', '=', '36')->count();
        $count_41 = applicant::where('Gred', '=', '41')->count();
        $count_44 = applicant::where('Gred', '=', '44')->count();
        $count_48 = applicant::where('Gred', '=', '48')->count();

        $Jan = DB::table('payment_records')
        ->where('bulan', '=', '0')
        ->sum('Amount');
     
        $Feb = DB::table('payment_records')
        ->where('bulan', '=', '1')
        ->sum('Amount');
 
        $Mar = DB::table('payment_records')
        ->where('bulan', '=', '2')
        ->sum('Amount');
 
        $Apr = DB::table('payment_records')
        ->where('bulan', '=', '3')
        ->sum('Amount');
 
        $May = DB::table('payment_records')
        ->where('bulan', '=', '4')
        ->sum('Amount');
 
        $Jun = DB::table('payment_records')
        ->where('bulan', '=', '5')
        ->sum('Amount');
 
        $Jul = DB::table('payment_records')
        ->where('bulan', '=', '6')
        ->sum('Amount');
         
        $Aug = DB::table('payment_records')
        ->where('bulan', '=', '7')
        ->sum('Amount');
     
        $Sep = DB::table('payment_records')
        ->where('bulan', '=', '8')
        ->sum('Amount');
 
        $Oct = DB::table('payment_records')
        ->where('bulan', '=', '9')
        ->sum('Amount');
 
        $Nov = DB::table('payment_records')
        ->where('bulan', '=', '10')
        ->sum('Amount');
 
        $Dis = DB::table('payment_records')
        ->where('bulan', '=', '11')
        ->sum('Amount');

        $payment = DB::table('payment_records')->get(['date_pymnt', 'Amount']);

        return view('Admin.dashboard_admin', ['data_pemohon' => $data_pemohon, 'data_student' => $data_student, 'degree' => $deg_ap, 'degreeapp' => $deg_p, 'master' => $mstr_ap, 'masterapp' => $mstr_p, 'phd' => $phd_ap, 'phdapp' => $phd_p, 'c36' => $count_36, 'c41' => $count_41, 'c44' => $count_44, 'c48' => $count_48, 'pembayaran' => $payment, 'Jan' => $Jan, 'Feb' => $Feb, 'Mar' => $Mar, 'Apr' => $Apr, 'May' => $May, 'Jun'=> $Jun, 'Jul' => $Jul, 'Aug' => $Aug, 'Sep' => $Sep, 'Oct' => $Oct, 'Nov' => $Nov, 'Dis' => $Dis]); 
    } 
    
   

    public function dataPemohon() {
        $data_pemohon = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();

        return view('Admin.table_pemohon', ['data_pemohon' => $data_pemohon]); 
    }

    public function dataPelajar() {
        $data_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();

        return view('Admin.table_pelajar', ['data_student' => $data_student]); 
    }

    public function viewTuntutan() {
        $tuntutan = DB::table('dokumen_results')
        ->join('users', 'users.id', 'dokumen_results.document_id')
        ->get();


        return view('Admin.table_tuntutan', ['tuntutan' => $tuntutan]); 
    }

    public function payment_record($id) {
        $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();
        $user_data = User::where('id', '=', $id)->first();

        return view('Admin.record_pmbyrn', ['id' => $id, 'user_data' => $user_data, 'payment' => $payments]);
        //dd($user_data);   
    }

    public function payment_claim($id, $data_id) {
        $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();
        $user_data = User::where('id', '=', $id)->first();
        $claim_info = Dokumen_result::where('document_id', '=', $id)
                    ->where('date_penyerahan', '=', $data_id)->first();

        return view('Admin.record_tuntutan', ['id' => $id, 'claim_info' => $claim_info, 'user_data' => $user_data, 'payment' => $payments]);    
        //dd($data_id, $id);    
    }

    public function update_payment($id) {
        $new_record = new payment_record;

        $new_record-> date_pymnt = request('date');
        $new_record-> bulan = request('month');
        $new_record-> tahun = request('year');
        $new_record-> No_baucer = request('baucer_no');
        $new_record-> jenis_pymnt = request('perkara');
        $new_record-> tempoh = request('tempoh');
        $new_record-> Amount = request('jumlah');
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

    public function profile_view($user_data) {
        $user_profile = DB::table('applicants')
        ->where('user_id', '=', $user_data)
        ->join('users', 'users.id', 'applicants.user_id')
        ->join('info__pengajians', 'users.id', 'info__pengajians.applicant_id' )
        ->first();

        return view('Admin.studentViewer', ['user_profile' => $user_profile]);
    }

    

    public function ApprovePelajar(User $user) {
        dd($user);
    }   

}
