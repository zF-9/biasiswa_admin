<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UploadPic() {
        $id = Auth::User()->id;

        $user = DB::table('users')->where('id', '=', $id)->first();
        if ($user === null) {
           // user doesn't exist
            alert('user does not exit');
        }   
        else {
            $user->profilepic = request()->file('profilepic')->store('public/uploadProfilePic');
        }     
    }

    public function profilepage() {
        $id = Auth::User()->id;

        $user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();
        $student_profile = DB::table('up_documents')->where('applicant_id', '=', $id)->first();

        if($user_profile == null){
            return view('User.dashboard_user')->withErrors(__('User belum bikin lagi permohonan'));
        }
    
        else {
            return view('profilepage', ['user_profile' => $user_profile, 'student_profile' => $student_profile]);          
        }    
    }

    public function profilePemohon() {
        $id = Auth::User()->id;

        $user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();

        if($user_profile == null){
            return view('User.dashboard_user')->withErrors(__('Permohon perlu mengisi borang maklumat pegawai'));
        }
    
        else {
            return view('User.ProfilePemohon', ['user_profile' => $user_profile]);          
        }    
    }

    public function profilePelajar() {
        $id = Auth::User()->id;

        $student_profile = DB::table('up_documents')->where('applicant_id', '=', $id)->first();

        if($student_profile == null){
            return view('User.dashboard_user')->withErrors(__('Pemohon perlu memuat naik dokumen'));
        }
    
        else {
            return view('User.ProfilePelajar', ['student_profile' => $student_profile]);          
        }    
    }

    public function payment_history() {
        $id = Auth::User()->id;

        $user_record = DB::table('payment_records')->where('payment_id', '=', $id)->first();  
        
        if($user_record == null) {
            return Redirect()->route('user-dashboard')->withErrors(['Tiada rekod pembayaran']);
        }
        else {
            $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();

            return view('User.userPymnt_record', ['payment' => $payments]);          
        }      
    }

}
