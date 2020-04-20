<?php

namespace App\Http\Middleware;

use DB;
use Closure;
use Redirect;
use Illuminate\Http\Request;

class ApplicantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     
    public function handle($request, Closure $next)
    {
        return $next($request);
    }*/
    public function handle($request, Closure $next)
    {

        $toggler = DB::table('Toggle_Index')->where('id', '=', '42')->pluck('index');
        //dd($toggler);

        if($toggler == null) {
            dd("muahaha");
            //return view('User.muatnaik');
        }
        else if($toggler == '1'){ 
            dd("mihihiihihihih");
            //return view('User.borang_pengajian');
        }
        else {
            return $next($request);
        }
        //else if($toggler == 2){ 
            //dd("mohohoho");
        //}
        //return redirect('dashboard_user');
    }

}
