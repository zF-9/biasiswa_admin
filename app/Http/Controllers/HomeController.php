<?php

namespace App\Http\Controllers;

use DB;
use App\Mail\Mailtrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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

    public function mail()
    {
        $name = 'Mr. Whoever you are';
        Mail::to('kewlzewl.kz@gmail.com')->send(new Mailtrap($name)); 
        return 'A message has been sent to Mailtrap!';
    }    

}
