<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

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
            return Redirect()->route('user-dashboard')->withErrors(['User belum kena approve lagi']);
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
        //$profile_id = Applicant::find($id)->index();

        if($user_profile == null){
            //return view('dashboard')->withStatus(__('User belum bikin lagi permohonan'));
            return Redirect::back()->withErrors(['User belum bikin lagi permohonan kali','']);
        }
    
        else {
            return view('profilepage', ['user_profile' => $user_profile]);          
        }    
    }
}
