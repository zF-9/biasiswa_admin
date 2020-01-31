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

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $data_applicant = $all_applicant->count();

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


        $rank = DB::table('applicants')->select('jabatan', DB::raw('count(*) as total'))->groupBy('jabatan')->get();
        $rank_jabatan = $rank->sortBy('total')->reverse()->values()->all();
        $rank_array = collect($rank_jabatan);

        if( $rank_array === null) {
            //
        }
        else {
            //top 5 agensi
            $total_sum = $rank_array->sum('total');

            $total_1 = $rank_array[0]->total; 
            $no_1 = $total_1 / $total_sum * 100;
            $agensi_1 = $rank_array[0]->jabatan;

            $total_2 = $rank_array[1]->total;
            $no_2 = $total_2 / $total_sum * 100;
            $agensi_2 = $rank_array[1]->jabatan;

            $total_3 = $rank_array[2]->total;
            $no_3 = $total_3 / $total_sum * 100;
            $agensi_3 = $rank_array[2]->jabatan;

            $total_4 = $rank_array[3]->total;
            $no_4 = $total_4 / $total_sum * 100;
            $agensi_4 = $rank_array[3]->jabatan;


            $total_5 = $rank_array[4]->total;
            $no_5 = $total_5 / $total_sum * 100;
            $agensi_5 = $rank_array[4]->jabatan;
            //top 5 agensi            
        }

        $test = DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->where('Gred', '=', '41')->where('AppliedKursus', '=', 'Sarjana Muda')->get();
        //dd($test);

        //degree by gred
        $gred_deg = collect(DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->select('Gred', DB::raw('count(*) as jumlah'))
        ->groupBy('Gred')->get()->sortBy('jumlah')->reverse()->values()->all());

        $deg_total = $gred_deg->sum('jumlah');

        //Master by gred
        $gred_mstr = collect(DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana')
        ->select('Gred', DB::raw('count(*) as jumlah'))
        ->groupBy('Gred')->get()->sortBy('jumlah')->reverse()->values()->all());

        //PhD by gred
        $gred_phd = collect(DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->select('Gred', DB::raw('count(*) as jumlah'))
        ->groupBy('Gred')->get()->sortBy('jumlah')->reverse()->values()->all());

        //taraf pelantikan 
        $stdnt_tetap = $all_student->where('TarafLantik', '=', 'Tetap')->count();
        $stdnt_percubaan = $all_student->where('TarafLantik', '=', 'Percubaan')->count();        
        $stdnt_Sementara = $all_student->where('TarafLantik', '=', 'Sementara')->count();
        $stdnt_Kontrak = $all_student->where('TarafLantik', '=', 'Kontrak')->count();

        //notification tuntutan 
        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;


        return view('Admin.dashboard_admin', ['data_pemohon' => $data_pemohon, 'data_student' => $data_student, 'data_applicant' => $data_applicant,'degree' => $deg_ap, 'degreeapp' => $deg_p, 'master' => $mstr_ap, 'masterapp' => $mstr_p, 'phd' => $phd_ap, 'phdapp' => $phd_p, 'c36' => $count_36, 'c41' => $count_41, 'c44' => $count_44, 'c48' => $count_48, 'pembayaran' => $payment, 'Jan' => $Jan, 'Feb' => $Feb, 'Mar' => $Mar, 'Apr' => $Apr, 'May' => $May, 'Jun'=> $Jun, 'Jul' => $Jul, 'Aug' => $Aug, 'Sep' => $Sep, 'Oct' => $Oct, 'Nov' => $Nov, 'Dis' => $Dis, 'FT_student' => $FT_student, 'PT_student' => $PT_student, 'payment' => $monthly, 'state' => $local_state, 'country' => $local_country, 'oversea' => $oversea, 'total_1' => $total_1, 'total_2' => $total_2, 'total_3' => $total_3, 'total_4' => $total_4, 'total_5' => $total_5, 'agensi_1' => $agensi_1, 'agensi_2' => $agensi_2, 'agensi_3' => $agensi_3, 'agensi_4' => $agensi_4, 'agensi_5' => $agensi_5, 'no_1' => $no_1, 'no_2' => $no_2, 'no_3' => $no_3, 'no_4' => $no_4, 'no_5' => $no_5, 'gred_d' => $gred_deg, 'tetap' => $stdnt_tetap, 'percubaan' => $stdnt_percubaan, 'sementara' => $stdnt_Sementara, 'kontrak' => $stdnt_Kontrak, 'g_deg' => $gred_deg, 'deg_total' => $deg_total,'g_mstr' => $gred_mstr, 'g_phd' => $gred_phd, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count]); 
    } 
    
   

    public function dataPemohon() {
        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $data_pemohon = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();

        return view('Admin.table_pemohon', ['data_pemohon' => $data_pemohon, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count]); 
    }

    public function dataPelajar() {
        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $data_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();

        return view('Admin.table_pelajar', ['data_student' => $data_student, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count]); 
    }

    public function viewTuntutan() {
        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $tuntutan = DB::table('dokumen_results')
        ->join('users', 'users.id', 'dokumen_results.document_id')
        ->get();


        return view('Admin.table_tuntutan', ['tuntutan' => $tuntutan, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count]); 
    }

    public function payment_record($id) {
        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();
        $user_data = User::where('id', '=', $id)->first();

        return view('Admin.record_pmbyrn', ['id' => $id, 'user_data' => $user_data, 'payment' => $payments, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count]);
        //dd($user_data);   
    }

    public function payment_claim($id, $data_id) {
        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();
        $user_data = User::where('id', '=', $id)->first();
        $claim_info = Dokumen_result::where('document_id', '=', $id)
                    ->where('date_penyerahan', '=', $data_id)->first();

        return view('Admin.record_tuntutan', ['id' => $id, 'claim_info' => $claim_info, 'user_data' => $user_data, 'payment' => $payments,  'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count]);    
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

        Dokumen_result::where('document_id', '=', $id)->update([
            'pay_status'=>true
        ]);

        $new_record->save();

        return Redirect::back();
    } 

    public function approve_pelajar() {
        $pelajar = request('student');
        $value = request('budget');

        applicant::where('nama', '=', $pelajar)->update([
            'isApproved'=>true,
            'budget' => $value
        ]);
        //dd([$pelajar, $value]);
        
        return Redirect()->route('table_pelajar');     
    }

    public function profile_view($user_data) {
        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $user_profile = DB::table('applicants')
        ->where('user_id', '=', $user_data)
        ->join('users', 'users.id', 'applicants.user_id')
        ->join('info__pengajians', 'users.id', 'info__pengajians.applicant_id' )
        ->first();

        return view('Admin.studentViewer', ['user_profile' => $user_profile, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count]);
    }

    
    /*public function ApprovePelajar(User $user) {
        dd($user);
    } */ 
    
  
}
