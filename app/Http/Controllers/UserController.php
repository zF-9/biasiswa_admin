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

    public function payment_history() {
        $id = Auth::User()->id;

        $user_record = DB::table('payment_records')->where('payment_id', '=', $id)->first();   
        
        if($user_record == null) {
            return Redirect()->route('user-dashboard')->withErrors(['Permohonan anda belum lagi diproses']);
        }
        else {
            //route to record pembayaran
            $payments = DB::table('payment_records')->get();

            return view('User.userPymnt_record', ['payment' => $payments]);          
        }        
    }

    public function profilepage() {
        $id = Auth::User()->id;

        $user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();
        $student_profile = DB::table('up_documents')->where('applicant_id', '=', $id)->first();
        //$profile_id = Applicant::find($id)->index();

        if($user_profile == null){
            return view('User.dashboard_user')->withErrors(__('User belum bikin lagi permohonan'));
            //return Redirect::back()->withErrors(['User belum bikin lagi permohonan kali','']);
        }
    
        else {
            return view('profilepage', ['user_profile' => $user_profile, 'student_profile' => $student_profile]);          
        }    
    }

    public function profilePemohon() {
        $id = Auth::User()->id;

        $user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();
        //$student_profile = DB::table('up_documents')->where('applicant_id', '=', $id)->first();
        //$profile_id = Applicant::find($id)->index();

        if($user_profile == null){
            return view('User.dashboard_user')->withErrors(__('Permohon perlu mengisi borang maklumat pegawai'));
            //return Redirect::back()->withErrors(['User belum bikin lagi permohonan kali','']);
        }
    
        else {
            return view('User.ProfilePemohon', ['user_profile' => $user_profile]);          
        }    
    }

    public function profilePelajar() {
        $id = Auth::User()->id;

        //$user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();
        $student_profile = DB::table('up_documents')->where('applicant_id', '=', $id)->first();
        //$profile_id = Applicant::find($id)->index();

        if($student_profile == null){
            return view('User.dashboard_user')->withErrors(__('Pemohon perlu memuat naik dokumen'));
            //return Redirect::back()->withErrors(['User belum bikin lagi permohonan kali','']);
        }
    
        else {
            return view('User.ProfilePelajar', ['student_profile' => $student_profile]);          
        }    
    }

}
