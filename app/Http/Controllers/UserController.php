<?php

namespace App\Http\Controllers;

use DB;
use Image;
use Redirect;
use App\applicant;
use App\Dokumen_result;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

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
        $student_profile = DB::table('info__pengajians')->where('applicant_id', '=', $id)->first();

        if($user_profile == null){
            return view('User.dashboard_user')->withErrors(__('User belum bikin lagi permohonan'));
        }
    
        else {
            return view('profilepage', ['user_profile' => $user_profile, 'student_profile' => $student_profile]);          
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
            //dd($user_profile);
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

        $user_profile = DB::table('applicants')
        ->where('user_id', '=', $id)
        ->join('users', 'users.id', 'applicants.user_id')
        ->join('info__pengajians', 'users.id', 'info__pengajians.applicant_id' )
        ->first();

        if($user_profile == null){
            return view('User.dashboard_user')->withErrors(__('Pemohon perlu mengisi borang maklumat pegawai'));
        }
    
        else {
            //dd($user_profile);
            return view('User.Profile_full', ['user_profile' => $user_profile]);          
        }        
    }

    public function payment_history() {
        $id = Auth::User()->id;

        $user_record = DB::table('payment_records')->where('payment_id', '=', $id)->first();  
        
        if($user_record == null) {
            return Redirect()->route('user-dashboard')->withErrors(['Pengguna belum diterima sebagai pelajar']);
        }
        else {
            $payments = DB::table('payment_records')->where('payment_id', '=', $id)->get();

            return view('User.userPymnt_record', ['payment' => $payments]);          
        }      
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
        //dd($path);
        $serahan_dokumen->save();
        return Redirect::back();

    }

    public function doc_res() {
        $id = Auth::User()->id;
        $student_record = DB::table('applicants')->where('user_id', '=', $id)->where('isApproved', '=', '1')->first();

        if($student_record == null) {
           return Redirect()->route('user-dashboard')->withErrors(['Pengguna belum diterima sebagai pelajar']);            
        }
        else {
            $list_document = DB::table('dokumen_results')->where('document_id', '=', $id)->get();
            return view('User.upload_docs', ['list_docs' => $list_document]); 
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
            $user->save();
        }
        return Redirect::back();
    }

}
