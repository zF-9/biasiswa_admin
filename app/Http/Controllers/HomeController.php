<?php

namespace App\Http\Controllers;

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
        return view('Admin.dashboard_admin');
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
