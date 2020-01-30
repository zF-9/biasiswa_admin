<?php

namespace App\Http\Controllers;

use PDF;
use DB;
use Redirect;
use Storage;
use App\User;
use App\applicant;
use App\Dokumen_result;
use App\info_Pengajian;
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

        $data_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->count();

        $all_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();

        $data_student = $all_student->count();

        $deg_ap = DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->get();

        $mstr_ap = DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana')
        ->get();

        $phd_ap = DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->get();

        $deg_p = $deg_ap->where('isApproved', '=', '1');
        $mstr_p = $mstr_ap->where('isApproved', '=', '1');
        $phd_p = $phd_ap->where('isApproved', '=', '1');


        $count_36 = applicant::where('Gred', '=', '36')->count();
        $count_41 = applicant::where('Gred', '=', '41')->count();
        $count_44 = applicant::where('Gred', '=', '44')->count();
        $count_48 = applicant::where('Gred', '=', '48')->count();

        $monthly = DB::table('payment_records')->get()->groupBy('bulan');
        //$monthly = compact('pay_month');
        $rank_jabatan = DB::table('applicants')->get(['nama', 'jabatan'])->groupBy('jabatan');
        //$new = $rank_jabatan->toArray();
        /*$lists = [];
        foreach($rank_jabatan as $key => $value)
        {
                  $lists[] = ['ranking' => $value];
        }*/
        //return $new;
        //$test_var = collect($rank_jabatan);

        $Jan = DB::table('payment_records')
        ->where('bulan', '=', '0')
        ->sum('amount');
     
        $Feb = DB::table('payment_records')
        ->where('bulan', '=', '1')
        ->sum('amount');
 
        $Mar = DB::table('payment_records')
        ->where('bulan', '=', '2')
        ->sum('amount');
 
        $Apr = DB::table('payment_records')
        ->where('bulan', '=', '3')
        ->sum('amount');
 
        $May = DB::table('payment_records')
        ->where('bulan', '=', '4')
        ->sum('amount');
 
        $Jun = DB::table('payment_records')
        ->where('bulan', '=', '5')
        ->sum('amount');
 
        $Jul = DB::table('payment_records')
        ->where('bulan', '=', '6')
        ->sum('amount');
         
        $Aug = DB::table('payment_records')
        ->where('bulan', '=', '7')
        ->sum('amount');
     
        $Sep = DB::table('payment_records')
        ->where('bulan', '=', '8')
        ->sum('amount');
 
        $Oct = DB::table('payment_records')
        ->where('bulan', '=', '9')
        ->sum('amount');
 
        $Nov = DB::table('payment_records')
        ->where('bulan', '=', '10')
        ->sum('amount');
 
        $Dis = DB::table('payment_records')
        ->where('bulan', '=', '11')
        ->sum('amount');

        $payment = DB::table('payment_records')->get(['date_pymnt', 'amount']);

        //student: study mode
        $FT_student = info_Pengajian::where('mod_pengajian', '=', 'Full Time')->join('applicants', 'info__pengajians.applicant_id', 'applicants.user_id')->count();
        $PT_student = info_pengajian::where('mod_pengajian', '=', 'Part Time')->join('applicants', 'info__pengajians.applicant_id', 'applicants.user_id')->count();
        //student: study mode

        //local-oversea student
        $local_state = info_Pengajian::where('tmpt_study', '=', 'Dalam Negeri Sabah')->count();
        $local_country = info_Pengajian::where('tmpt_study', '=', 'Luar Negeri Sabah')->count();
        $oversea = info_Pengajian::where('tmpt_study', '=', 'Luar Negara')->count();
        //local-oversea student

        //test script
        $test_04 = $deg_p->where('Gred', '=', '41')->count();
        $test_05 = $deg_p->where('Gred', '=', '44')->count();
        $test_06 = $deg_p->where('Gred', '=', '48')->count();

        $test_01 = $mstr_p->where('Gred', '=', '41')->count();
        $test_02 = $mstr_p->where('Gred', '=', '44')->count();
        $test_03 = $mstr_p->where('Gred', '=', '48')->count();

        $test_07 = $phd_p->where('Gred', '=', '41')->count();
        $test_08 = $phd_p->where('Gred', '=', '44')->count();
        $test_09 = $phd_p->where('Gred', '=', '48')->count();

        //dd(compact('rank_jabatan'));

        return view('Admin.dashboard_admin', ['data_pemohon' => $data_pemohon, 'data_student' => $data_student, 'data_applicant' => $data_applicant,'degree' => $deg_ap, 'degreeapp' => $deg_p, 'master' => $mstr_ap, 'masterapp' => $mstr_p, 'phd' => $phd_ap, 'phdapp' => $phd_p, 'c36' => $count_36, 'c41' => $count_41, 'c44' => $count_44, 'c48' => $count_48, 'pembayaran' => $payment, 'Jan' => $Jan, 'Feb' => $Feb, 'Mar' => $Mar, 'Apr' => $Apr, 'May' => $May, 'Jun'=> $Jun, 'Jul' => $Jul, 'Aug' => $Aug, 'Sep' => $Sep, 'Oct' => $Oct, 'Nov' => $Nov, 'Dis' => $Dis, 'FT_student' => $FT_student, 'PT_student' => $PT_student, 'payment' => $monthly, 'state' => $local_state, 'country' => $local_country, 'oversea' => $oversea, 'rank' => compact('rank_jabatan')]); 
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
        $new_record-> amount = request('jumlah');
        $new_record-> payment_id = $id;

        $new_record->save();

        return Redirect::back();
    } 

    public function approve_pelajar($id) {
        $value = request('budget');

        applicant::where('user_id', '=', $id)->update([
            'isApproved'=>true,
            'budget' => $value
        ]);
        dd([$id], [$value]);
        
        return Redirect()->route('table_pelajar');     
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
    
  //  public function update_budget($req){
     //   $value = request('budget');
//  applicant::where('nama', '=',  $req)->update([

         //   'budget' => $value

       // ]);

        //return Redirect()->route('table_pemohon');     
    
        
    
        
    



}
