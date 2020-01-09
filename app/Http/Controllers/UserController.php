<?php

namespace App\Http\Controllers;

use DB;
use Image;
use Redirect;
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

    public function mn_dokumen() {
        $id = Auth::User()->id;

        $serahan_dokumen = new Dokumen_result;
        $serahan_dokumen-> date_penyerahan = request('date_up');
        $serahan_dokumen-> perkara = request('thewhat');
        $serahan_dokumen-> tuntutan = request('tuntutan');
        $serahan_dokumen-> file = request()->file('dokumen')->store('public/uploadocs');
        $serahan_dokumen-> document_id = $id;

        $serahan_dokumen->save();
        return Redirect::back();
    }

    public function doc_res() {
        $id = Auth::User()->id;

        $list_document = DB::table('dokumen_results')->where('document_id', '=', $id)->get();
        return view('User.upload_docs', ['list_docs' => $list_document]); 
    }


    public function update_avatar(Request $request){
        $id = Auth::User()->id;
        //$user = User::where('id', '=', $id);
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar'); //avatar is the name of input
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('storage/profilePic/' . $filename );
            Image::make($avatar)->resize(300, 300)->save( $path );
            //->store('public/profilePic' );
            //->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::User();
            $user->avatar = $filename;
            $user->save();
        }

        /*$user_profile = DB::table('applicants')
        ->where('user_id', '=', $id)
        ->join('users', 'users.id', 'applicants.user_id')
        ->first();*/

        return Redirect::back();
        //return ::route('profile_pemohon', ['user_profile' => $user_profile ]);
        //dd($user);
    }

}
