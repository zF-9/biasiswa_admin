<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home'); //originally:home
    }

    public function Admin()
    {
        $data_pemohon = DB::table('applicants')->get();
        //return view('Admin.dashboard_admin');
        //return view('Admin.dashboard_admin', ['data_pemohon' => $data_pemohon]); 
        $deg_p = DB::table('up_documents')->where('AkademikLvl', '=', 'Sarjana Muda')->get();
        $mstr_p = DB::table('up_documents')->where('AkademikLvl', '=', 'Sarjana')->get();
        $phd_p = DB::table('up_documents')->where('AkademikLvl', '=', 'Doktor Falsafah')->get();
    
        //so, everything yg load d admin dashboard perlu kena parse di Method yg ini
    
        return view('Admin.dashboard_admin', ['data_pemohon' => $data_pemohon, 'degree' => $deg_p, 'master' => $mstr_p, 'phd' => $phd_p]);  
    }  

    public function AdminProfile()
    {
        return view('Admin.ProfilepageAdmin');
    } 

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

}
