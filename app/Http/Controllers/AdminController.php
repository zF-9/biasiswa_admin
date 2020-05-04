<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Redirect;
use Storage;
use App\User;
use \Carbon\Carbon;
use App\applicant;
use App\Dokumen_result;
use App\info_Pengajian;
use App\upDocuments;
use App\payment_record;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use GuzzleHttp\Exception\GuzzleException;


class AdminController extends Controller
{
    public function AdminProfile()
    {
        return view('Admin.ProfilepageAdmin');
    } 
    
    public function AdminDashboard()
    {
        //$mytime = Carbon\Carbon::now();
        //dd($mytime);
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $data_pemohon = DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->count();

       // $data_pemohon = DB::table('applicants')->count();

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_applicantss = DB::table('applicants')
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
        $FT_degrees = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('mod_pengajian', '=', 'Sepenuh Masa')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->count();

        $PT_degrees = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('mod_pengajian', '=', 'Separuh Masa')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->count();

        $FT_mstrs = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('mod_pengajian', '=', 'Sepenuh Masa')
        ->where('AppliedKursus', '=', 'Sarjana')
        ->count();

        $PT_mstrs = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('mod_pengajian', '=', 'Separuh Masa')
        ->where('AppliedKursus', '=', 'Sarjana')
        ->count();

        $FT_phds = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('mod_pengajian', '=', 'Sepenuh Masa')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->count();

        $PT_phds = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('mod_pengajian', '=', 'Separuh Masa')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->count();

        //student: study mode
        //pemohon: study mode
        $FT_degree = info_Pengajian::where('mod_pengajian', '=', 'Sepenuh Masa')
        ->join('applicants', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->count();
        $PT_degree = info_pengajian::where('mod_pengajian', '=', 'Separuh Masa')
        ->join('applicants', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->count();
        $FT_mstr = info_Pengajian::where('mod_pengajian', '=', 'Sepenuh Masa')
        ->join('applicants', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana')
        ->count();
        $PT_mstr = info_pengajian::where('mod_pengajian', '=', 'Separuh Masa')
        ->join('applicants', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana')
        ->count();
        $FT_phd = info_Pengajian::where('mod_pengajian', '=', 'Sepenuh Masa')
        ->join('applicants', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->count();
        $PT_phd = info_pengajian::where('mod_pengajian', '=', 'Separuh Masa')
        ->join('applicants', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->count();
        //pemohon : mod pengajian

        //local-oversea student
        $local_state = info_Pengajian::where('tmpt_study', '=', 'Dalam Negeri Sabah')->count();
        $local_country = info_Pengajian::where('tmpt_study', '=', 'Luar Negeri Sabah')->count();
        $oversea = info_Pengajian::where('tmpt_study', '=', 'Luar Negara')->count();

        $state_p = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('tmpt_study', '=', 'Dalam Negeri Sabah')
        ->count();
      
        $country_p  = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('tmpt_study', '=', 'Luar Negeri Sabah')
        ->count();
       $oversea_p = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('tmpt_study', '=', 'Luar Negara')
        ->count();

   
     
        //local-oversea student

        $rank = DB::table('applicants')->select('jabatan', DB::raw('count(*) as total'))->groupBy('jabatan')->get();
        $rank_jabatan = $rank->sortBy('total')->reverse()->values()->all();
        $rank_array = collect($rank_jabatan);

        if( $rank_jabatan == null) {
            //
        }
        else {
            //top 5 agensi
            $total_sum = $rank_array->sum('total');
            $multiplier = $rank_array->count();


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

        $rank_pel = DB::table('applicants')->where('isApproved', '=', '1')->select('jabatan', DB::raw('count(*) as total'))->groupBy('jabatan')->get();
        $rank_jabatan_pel = $rank_pel->sortBy('total')->reverse()->values()->all();
        $rank_array_pel = collect($rank_jabatan_pel);

        if( $rank_jabatan_pel == null) {
            //dd("dafjmdiuchasd");
        }
        else {
            //top 5 agensi
            $total_sum_pel = $rank_array_pel->sum('total');

            $total_1_pel = $rank_array_pel[0]->total; 
            $no_1_pel = $total_1_pel / $total_sum_pel * 100;
            $agensi_1_pel = $rank_array_pel[0]->jabatan;
            
            $total_2_pel = $rank_array_pel[1]->total;
            $no_2_pel = $total_2_pel / $total_sum_pel * 100;
            $agensi_2_pel = $rank_array_pel[1]->jabatan;

            $total_3_pel = $rank_array_pel[2]->total;
            $no_3_pel = $total_3_pel / $total_sum_pel * 100;
            $agensi_3_pel = $rank_array_pel[2]->jabatan;

            $total_4_pel = $rank_array_pel[3]->total;
            $no_4_pel = $total_4_pel / $total_sum_pel * 100;
            $agensi_4_pel = $rank_array_pel[3]->jabatan;


            $total_5_pel = $rank_array_pel[4]->total;
            $no_5_pel = $total_5_pel / $total_sum_pel * 100;
            $agensi_5_pel = $rank_array_pel[4]->jabatan;
            //top 5 agensi           
        }

        //degree by gred
        $gred_deg = collect(DB::table('applicants')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Sarjana Muda')
        ->select('Gred', DB::raw('count(*) as jumlah'))
        ->groupBy('Gred')->get()->sortBy('jumlah')->reverse()->values()->all());

        $gred_degp = collect(DB::table('applicants')->where('isApproved', '=', '1')
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

        $gred_mstrp = collect(DB::table('applicants')->where('isApproved', '=', '1')
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

        $gred_phdp = collect(DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->where('AppliedKursus', '=', 'Doktor Falsafah')
        ->select('Gred', DB::raw('count(*) as jumlah'))
        ->groupBy('Gred')->get()->sortBy('jumlah')->reverse()->values()->all());

        //taraf pelantikan (student)
        $stdnt_tetap = $all_student->where('TarafLantik', '=', 'Tetap')->count();
        $stdnt_percubaan = $all_student->where('TarafLantik', '=', 'Percubaan')->count();        
        $stdnt_Sementara = $all_student->where('TarafLantik', '=', 'Sementara')->count();
        $stdnt_Kontrak = $all_student->where('TarafLantik', '=', 'Kontrak')->count();

        //taraf pelantikan (pemohon)
        $stdnt_tetaps = $all_applicantss->where('TarafLantik', '=', 'Tetap')->count();
        $stdnt_percubaans = $all_applicantss->where('TarafLantik', '=', 'Percubaan')->count();        
        $stdnt_Sementaras = $all_applicantss->where('TarafLantik', '=', 'Sementara')->count();
        $stdnt_Kontraks = $all_applicantss->where('TarafLantik', '=', 'Kontrak')->count();

    
        //notification tuntutan 
        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        //gred 41 <= x => 41 (student/applicant)
        $stdnt_above_41 = $all_student->where('Gred', '<=', '41')->count();
        $stdnt_below_41 = $all_student->where('Gred', '>=', '41')->count();
        
        $appcnt_above_41 = $all_applicant->where('Gred', '<=', '41')->count();  
        $appcnt_below_41 = $all_applicant->where('Gred', '>', '41')->count(); 

        //test api fetching 

        /*$fetch_API = new \GuzzleHttp\Client();
        $API_data = $fetch_API->request('GET', 'https://api.bnm.gov.my/public/usd-interbank-intraday-rate', 
            [ 'headers' => [] ]
        );
        $array_test = response()->json(array('testry' => $API_data));
        $cubatrytest = $API_data->getStatusCode();*/

        //dd($API_data);

       return view('Admin.admin_db', ['data_pemohon' => $data_pemohon, 'data_student' => $data_student, 'data_applicant' => $data_applicant,'degree' => $deg_ap, 'degreeapp' => $deg_p, 'master' => $mstr_ap, 'masterapp' => $mstr_p, 'phd' => $phd_ap, 'phdapp' => $phd_p, 'pembayaran' => $payment, 'Jan' => $Jan, 'Feb' => $Feb, 'Mar' => $Mar, 'Apr' => $Apr, 'May' => $May, 'Jun'=> $Jun, 'Jul' => $Jul, 'Aug' => $Aug, 'Sep' => $Sep, 'Oct' => $Oct, 'Nov' => $Nov, 'Dis' => $Dis, 'FT_degree' => $FT_degree, 'FT_degrees' => $FT_degrees, 'PT_degree' => $PT_degree, 'PT_degrees' => $PT_degrees, 'FT_mstr' => $FT_mstr, 'FT_mstrs' => $FT_mstrs, 'PT_mstr' => $PT_mstr, 'PT_mstrs' => $PT_mstrs, 'FT_phd' => $FT_phd, 'FT_phds' => $FT_phds, 'PT_phd' => $PT_phd, 'PT_phds' => $PT_phds, 'payment' => $monthly, 'state' => $local_state, 'states' => $state_p, 'country' => $local_country, 'countrys' => $country_p, 'overseas' => $oversea_p, 'oversea' => $oversea, 'total_1' => $total_1, 'total_2' => $total_2, 'total_3' => $total_3, 'total_4' => $total_4, 'total_5' => $total_5, 'agensi_1' => $agensi_1, 'agensi_2' => $agensi_2, 'agensi_3' => $agensi_3, 'agensi_4' => $agensi_4, 'agensi_5' => $agensi_5, 'no_1' => $no_1, 'no_2' => $no_2, 'no_3' => $no_3, 'no_4' => $no_4, 'no_5' => $no_5, 'gred_d' => $gred_deg, 'tetap' => $stdnt_tetap, 'tetaps' => $stdnt_tetaps, 'percubaan' => $stdnt_percubaan, 'percubaans' => $stdnt_percubaans, 'sementara' => $stdnt_Sementara, 'sementaras' => $stdnt_Sementaras, 'kontrak' => $stdnt_Kontrak, 'kontraks' => $stdnt_Kontraks, 'g_deg' => $gred_deg, 'g_degp' => $gred_degp, 'deg_total' => $deg_total,'g_mstr' => $gred_mstr,'g_mstrp' => $gred_mstrp, 'g_phd' => $gred_phd, 'g_phdp' => $gred_phdp, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 's_a_41' => $stdnt_above_41, 's_b_41' => $stdnt_below_41, 'a_a_41' => $appcnt_above_41, 'a_b_41' => $appcnt_below_41, 'agensi_1_pel' => $agensi_1_pel, 'agensi_2_pel' => $agensi_2_pel, 'agensi_3_pel' => $agensi_3_pel, 'agensi_4_pel' => $agensi_4_pel, 'agensi_5_pel' => $agensi_5_pel, 'total_1_pel' => $total_1_pel, 'total_2_pel' => $total_2_pel, 'total_3_pel' => $total_3_pel, 'total_4_pel' => $total_4_pel, 'total_5_pel' => $total_5_pel, 'no_1_pel' => $no_1_pel, 'no_2_pel' => $no_2_pel, 'no_3_pel' => $no_3_pel, 'no_4_pel' => $no_4_pel, 'no_5_pel' => $no_5_pel, 'status' => $status]);
    } 

    public function dataPemohon() {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $data_pemohon = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();
        //dd($data_pemohon);

        return view('Admin.table_pemohon', ['data_pemohon' => $data_pemohon, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'status' => $status]); 
    }

    public function destroy_pemohon() {
        $pemohon = request('student');
        $detail_pemohon = DB::table('applicants')->where('isApproved', '=', '0')
                          ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
                          ->where('nama', '=', $pemohon)
                          ->get();


        $detail_pemohon->delete();

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
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $data_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
        ->get();
        //$data_student = DB::table('up_documents')->get();

        return view('Admin.table_pelajar', ['data_student' => $data_student, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'status' => $status]); 
    }

    public function viewTuntutan() {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $tuntutan = DB::table('dokumen_results')
        ->join('users', 'users.id', 'dokumen_results.document_id')
        ->get();


        return view('Admin.table_tuntutan', ['tuntutan' => $tuntutan, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'status' => $status]); 
    }


    public function payment_record($id) {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();
        $claimed = Dokumen_result::where('document_id', $id)->where('pay_status', true)->first();

        $user_data = DB::table('users')->where('id', '=', $id)->first();

        return view('Admin.record_pmbyrn', ['id' => $id, 'user_data' => $user_data, 'payment' => $payments, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'status' => $status]);
           
    }

    public function payment_claim($id, $data_id, $pid) {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

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

        return view('Admin.record_tuntutan', ['id' => $id, 'claim_info' => $claim_info, 'user_data' => $user_data, 'payment' => $payments,  'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'status' => $status, 'pid' => $pid]);    
        //dd($data_id, $id);   
    } 

    /*public function payment_record() {
        $payments = DB::table('payment_records')->get();

        return view('Admin.record_pmbyrn', ['payment' => $payments]);   

    }*/

    public function update_payment($id, $pid) {
        //dd($id, $pid);
        $new_record = new payment_record;

        $new_record-> date_pymnt = request('date');
        $new_record-> bulan = request('month');
        $new_record-> tahun = request('year');
        $new_record-> No_baucer = request('baucer_no');
        $new_record-> jenis_pymnt = request('perkara');

        $new_record-> tempoh = request('tempoh');
        $new_record-> amount = request('jumlah');
        $new_record-> payment_id = $id;


        Dokumen_result::where('pay_id', '=', $pid)->update([
            'pay_status'=>true
        ]);

        $new_record->save();

        return Redirect::back();
    } 


    public function add_elaun() {
        $pelajar = request('student');
        $value = request('budget');

        applicant::where('nama', '=', $pelajar)->update([
            'budget' => $value
        ]);

        User::where('name', $pelajar)->update([
            'status'=>'student'
        ]);
        
        return Redirect()->route('table_pelajar');     
    }

    public function approve_pelajar($student_id) {


        User::where('id', '=', $student_id)->update([
            'status'=>'student'
        ]);

        applicant::where('user_id', '=', $student_id)->update([
            'isApproved'=>true
        ]);

   

        //return Redirect::Route('email-lulus', array($student_id));
        return Redirect::Route('board')->withErrors(__('Permohonan berjaya diluluskan'));
    }

    public function disapprove_pelajar($student_id) {
        
        /*applicant::where('user_id', '=', $student_id)->update([
            'isApproved'=>false
        ]);

        User::where('id', '=', $student_id)->update([
            'status'=>'applicant'
        ]);*/

        //return Redirect::Route('email-gagal', array($student_id));
        return Redirect::Route('board')->withErrors(__('Permohonan berjaya diluluskan'));
    }

    public function update_status($applicant_id) {
        //$pelajar = request('student');
        $new_status = request('Status_updater');

        info_Pengajian::where('applicant_id', $applicant_id)->update([
            'status_pengajian'=> $new_status
        ]);
        return Redirect()->route('table_pelajar');
    }

    public function destroy($id)
    {
        //
        Wod::find($id)->delete();

        return redirect()->action("WodController@index");

    }

    public function profile_view($user_data) {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

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

        $claim_doc = DB::table('applicants')
        ->where('user_id', '=', $user_data)
        ->join('dokumen_results', 'dokumen_results.document_id', 'applicants.user_id')
        ->get();

        $total_budget = DB::table('applicants')
        ->where('user_id', '=', $user_data)
        ->sum('budget');

        $total_paid = DB::table('applicants')
        ->where('user_id', '=', $user_data)
        ->join('payment_records', 'payment_records.payment_id', 'applicants.user_id')
        ->sum('amount');

        $total_claimed = DB::table('applicants')
        ->where('user_id', '=', $user_data)
        ->join('dokumen_results', 'dokumen_results.document_id', 'applicants.user_id')
        ->sum('tuntutan');       

        $paid = $total_claimed + $total_paid;
        $balance_budget = $total_budget - $paid;

        return view('Admin.studentViewer', ['user_profile' => $user_profile, 'budget' => $total_budget, 'paid' => $paid, 'balance' => $balance_budget, 'tuntut' => $claim_doc, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'status' => $status]);
    }

    public function profile_AMSAN($user_name, $current_user) {
        //dd($user_name);
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');
        //navbar variables

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $user_current = DB::table('applicants')
        ->where('user_id', '=', $current_user)
        ->join('users', 'users.id', 'applicants.user_id')
        ->join('info__pengajians', 'users.id', 'info__pengajians.applicant_id' );

        $user_profile = $user_current->first();

        $cost_1 = $user_current->pluck('budget');
        $cost_2 = $user_current->pluck('cost_pengajian');
        $total_cost = $cost_1[0] + $cost_2[0];
        //dd($cost_2[0]);

        $endYear = $user_current->pluck('EndStudy');
        $startYear = $user_current->pluck('startStudy');

        return view('Admin.profileAMSAN', ['user_profile' => $user_profile, 'noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'status' => $status, 'total_cost' => $total_cost, 'startY' => $startYear[0], 'endY' => $endYear[0]]);
    }

    public function Admin_settings() {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $toggle = DB::table('Toggle_Index')->where('id', '=', '42')->get();
        $toggler = $toggle[0]->index;

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        return view('Admin.settings_admin', ['noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'index' => $toggler, 'status' => $status]);
    }


    /*public function ApprovePelajar(User $user) {
        //$var = request('data_id');
        //$user->name();
        //$data_user = request('data_id');
        dd($user);
    }*/   


    public function store_settings(Request $request){
            if($request->has('toggle_1')){ 
                DB::table('Toggle_Index')->where('id', '=', '42')->update([
                    'index' => '1'
                ]);
            }
            else if($request->has('toggle_2')){ 
                DB::table('Toggle_Index')->where('id', '=', '42')->update([
                    'index' => '2'
                ]);
            }
            else if($request->has('toggle_3')){ 
                DB::table('Toggle_Index')->where('id', '=', '42')->update([
                    'index' => '3'
                ]);
            }
            else{
                //Checkbox not checked
                dd("ini kosong");
            }
            return Redirect()->route('setting');
    }

    public function stats_protoype() {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $toggle = DB::table('Toggle_Index')->where('id', '=', '42')->get();
        $toggler = $toggle[0]->index;

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        return view('Admin.statisticpage', ['noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'index' => $toggler, 'status' => $status]);
    }

    public function filtered_view() {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $all_applicant = DB::table('applicants')->where('isApproved', '=', '0')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $all_student = DB::table('applicants')->where('isApproved', '=', '1')
        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $toggle = DB::table('Toggle_Index')->where('id', '=', '42')->get();
        $toggler = $toggle[0]->index;

        $all_claim = DB::table('dokumen_results')->join('users', 'users.id', 'dokumen_results.document_id')->where('pay_status', '=', '0')->get();
        $claim_count = $all_claim->count();
        $applicant_count = $all_applicant->count();
        $noti_count = $claim_count + $applicant_count;

        $abroad_ft = $all_applicant->where('tmpt_study', '=', 'Luar Negara')->where('mod_pengajian', "Sepenuh Masa");
        $abroad_pt = $all_applicant->where('tmpt_study', '=', 'Luar Negara')->where('mod_pengajian', "Separuh Masa");

        $local_ft_s = $all_applicant->where('tmpt_study', '=', 'Dalam Negeri Sabah')->where('mod_pengajian', "Sepenuh Masa");
        $local_ft_ns = $all_applicant->where('tmpt_study', '=', 'Luar Negeri Sabah')->where('mod_pengajian', "Sepenuh Masa");

        $local_ft = $local_ft_s->merge($local_ft_ns);

        $local_pt_s = $all_applicant->where('tmpt_study', '=', 'Dalam Negeri Sabah')->where('mod_pengajian', "Separuh Masa");        
        $local_pt_ns = $all_applicant->where('tmpt_study', '=', 'Luar Negeri Sabah')->where('mod_pengajian', "Separuh Masa");

        $local_pt = $local_pt_s->merge($local_pt_ns);
 
        //$local_all = $local_s->merge($local_c);

        //$full_time = $all_applicant->where('mod_pengajian', '=', 'Sepenuh Masa');
        //$part_time = $all_applicant->where('mod_pengajian', '=', 'Separuh Masa');


        return view('Admin.ahlimesyuarat', ['noti_claim' => $all_claim, 'noti_pemohon' => $all_applicant, 'noti_count' => $noti_count, 'index' => $toggler, 'abroad_ft' => $abroad_ft, 'abroad_pt' => $abroad_pt, 'local_ft' => $local_ft, 'local_pt' => $local_pt, 'status' => $status]);

    }

}
