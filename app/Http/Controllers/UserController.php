<?php

namespace App\Http\Controllers;

use DB;
use Image;
use Redirect;
use App\User;
use App\applicant;
use App\Dokumen_result;
use App\payment_record;
use App\info_Pengajian;
use App\tanggungan_pelajar;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Exports\UsersExport;
use App\Exports\chartExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function user_dashboard() {
        $id_user = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $user_noti = payment_record::where('payment_id', '=', $id_user)->get();


        return view('User.dashboard_user', ['user_noti' => $user_noti, 'status' => $status]);

    }

    public function exportstudent() 
    {
        //sreturn (new InvoicesExport)->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
      return Excel::download(new UsersExport, 'Student.csv');
    }

    public function exportlaporan() 
    {
        //sreturn (new InvoicesExport)->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
      return Excel::download(new chartExport, 'Laporan.csv');
    }

    public function profilepage() {
        $id = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();
        $student_profile = DB::table('info__pengajians')->where('applicant_id', '=', $id)->first();

        if($user_profile == null){
            return view('User.dashboard_user')->withErrors(__('User belum bikin lagi permohonan'));
        }
    
        else {
            return view('profilepage', ['user_profile' => $user_profile, 'student_profile' => $student_profile, 'status' => $status]);          
        }    
    }

    public function profilePemohon() {
        $id = Auth::User()->id;

        $user_profile = DB::table('applicants')
        ->where('user_id', '=', $id)
        ->join('users', 'users.id', 'applicants.user_id')
        ->first();

        if($user_profile == null){
            return view('User.dashboard_user')->withErrors(__('Pemohon perlu mengisi borang maklumat pegawai'));
        }
    
        else {
            return view('User.ProfilePemohon', ['user_profile' => $user_profile]);          
        }    
    }


    public function profilePelajar() {
        $id = Auth::User()->id;

        $student_profile = DB::table('info__pengajians')->where('applicant_id', '=', $id)->first();

        if($student_profile == null){
            return view('User.dashboard_user')->withErrors(__('Pemohon perlu memuat naik dokumen'));
        }
    
        else {
            return view('User.ProfilePelajar', ['student_profile' => $student_profile]);          
        }    
    }

    public function profile_penuh() {
        $id = Auth::User()->id;
        $status = User::where('id', $id)->pluck('status');

        $user_noti = payment_record::where('payment_id', '=', $id)->get();        

        $user_profile = DB::table('applicants')
        ->where('user_id', '=', $id)
        ->join('users', 'users.id', 'applicants.user_id')
        ->join('info__pengajians', 'users.id', 'info__pengajians.applicant_id' )
        ->first();

        $claim_doc = DB::table('applicants')
        ->where('user_id', '=', $id)
        ->join('dokumen_results', 'dokumen_results.document_id', 'applicants.user_id')
        ->get();

        $total_budget = DB::table('applicants')
        ->where('user_id', '=', $id)
        ->sum('budget');

        $total_paid = DB::table('applicants')
        ->where('user_id', '=', $id)
        ->join('payment_records', 'payment_records.payment_id', 'applicants.user_id')
        ->sum('amount');

        $total_claimed = DB::table('applicants')
        ->where('user_id', '=', $id)
        ->join('dokumen_results', 'dokumen_results.document_id', 'applicants.user_id')
        ->sum('tuntutan');       

        $paid = $total_claimed + $total_paid;
        $balance_budget = $total_budget - $paid;


        if($user_profile == null){
            return view('User.dashboard_user', ['user_profile' => $user_profile, 'user_noti' => $user_noti, 'budget' => $total_budget, 'paid' => $paid, 'balance' => $balance_budget, 'tuntut' => $claim_doc, 'status' => $status])->withErrors(__('Pemohon perlu mengisi borang maklumat pegawai'));
        }
    
        else {
            return view('User.Profile_full', ['user_profile' => $user_profile, 'user_noti' => $user_noti, 'budget' => $total_budget, 'paid' => $paid, 'balance' => $balance_budget, 'tuntut' => $claim_doc, 'status' => $status]);          
        }        
    }

    public function payment_history() {
        $id = Auth::User()->id;
        $status = User::where('id', $id_user)->pluck('status');

        $user_noti = payment_record::where('payment_id', '=', $id)->get();   

        $user_record = DB::table('payment_records')->where('payment_id', '=', $id)->first();  
        
        if($user_record == null) {
            return Redirect()->route('user-dashboard')->withErrors(['Pengguna belum diterima sebagai pelajar']);
        }
        else {
            $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();

            return view('User.userPymnt_record', ['payment' => $payments, 'user_noti' => $user_noti, 'status' => $status]);          
        }      
    }

    public function proto() {
        $id = Auth::User()->id;
        $status = User::where('id', $id)->pluck('status');

        $rekod_pegawai = applicant::where('user_id', $id)->first();
        $rekod_pengajian = info_Pengajian::where('applicant_id', $id)->first();

        if($rekod_pegawai != null && $rekod_pengajian != null) {
            //dd("Pengawai and Pengajian data exists");
            //pass step yg ke-3
            $breadcrumbs = "2";
        }
        elseif($rekod_pegawai != null && $rekod_pengajian == null){
            //dd("rekod pegawai exists");
            //pass step yg ke-2
            $breadcrumbs = "1";
        }
        elseif($rekod_pegawai == null && $rekod_pengajian != null){
            //dd("rekod pengajian exists");
            //pass step yg 
            $breadcrumbs = "9";
        }
        else {
            //dd("Pengawai and Pengajian data does not exists");
            //step default: initial stage
            $breadcrumbs = "0";
        }

        $user_noti = payment_record::where('payment_id', '=', $id)->get();   

        return view('User.borang_proto', ['user_noti' => $user_noti, 'status' => $status, 'steps' => $breadcrumbs]);                   
    }

    public function mn_dokumen(Request $request) {
        $id = Auth::User()->id;

        $serahan_dokumen = new Dokumen_result;
        $serahan_dokumen-> date_penyerahan = request('date_up');
        $serahan_dokumen-> perkara = request('thewhat');
        $serahan_dokumen-> tempoh = request('tempoh');
        $serahan_dokumen-> tuntutan = request('tuntutan');

        $file = $request->file('dokumen');
        $originalname = $file->getClientOriginalName();
        $serahan_dokumen-> file = $file->storeAs('public/upload_docs', $originalname);

        $serahan_dokumen-> document_id = $id;

        $serahan_dokumen->save();
        return Redirect::back();
    }

    public function doc_res() {
        $id = Auth::User()->id;
        //$status = applicant::where('user_id', '=', $id)->pluck('isApproved');
        $status = User::where('id', $id_user)->pluck('status');

        $user_noti = payment_record::where('payment_id', '=', $id)->get();   
        $student_record = DB::table('applicants')->where('user_id', '=', $id)->where('isApproved', '=', '1')->first();

        if($student_record == null) {
           return Redirect()->route('user-dashboard')->withErrors(['Pengguna belum diterima sebagai pelajar']);            
        }
        else {
            $list_document = DB::table('dokumen_results')->where('document_id', '=', $id)->get();
            return view('User.upload_docs', ['list_docs' => $list_document, 'user_noti' => $user_noti, 'status' => $status]); 
        }
    }


    public function update_avatar(Request $request){
        $id = Auth::User()->id;

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar'); 
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('storage/profilePic/' . $filename );
            Image::make($avatar)->resize(300, 300)->save( $path );


            $user = Auth::User();
            $user->avatar = $filename;
            $user->update(); //save()
        }
        return Redirect::back();
    }

   // public function UploadBudget() {
    //    $id = Auth::User()->id;

    //    $user = DB::table('users')->where('id', '=', $id)->first();
     //   if ($user === null) {
      //     // user doesn't exist
       //     alert('user does not exit');
     //   }   
     //   else {
      //      $user->profilepic = request()->file('profilepic')->store('public/uploadProfilePic');
     //   }     
    //}


}
