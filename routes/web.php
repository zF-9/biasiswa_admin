<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/datatable', function () {
    //return view('datatable');
    $penerima_biasiswa = DB::table('applicants')->get();

    return view('datatable', ['penerima_biasiswa' => $penerima_biasiswa]);    
});

Route::get('/login', function () { 
    return view('login');
});

Route::get('/register', function() {
	return view('register');
});

Route::get('/permohonan_baru','ApplicantController@apply');
Route::post('/permohonan_baru', 'ApplicantController@store');

Route::get('/muatnaik','ApplicantController@apply');
Route::post('/muatnaik', 'ApplicantController@upload');

Route::get('/dashboard', function() {
	return view('admin_dashboard');
});

Route::get('/form', function() {
	return view('form');
});

Route::get('/profile', function() {
	//fetch semua yang ada dlm table 'applicants' 
    $penerima_biasiswa = DB::table('applicants')->get();
    //to fetch specific row dri table (where -> arguement yg paling last tu yg kena query dari database ):
    //$penerima_biasiswa = Applicant::find($applicant->id);
;
    return view('profilepage', ['penerima_biasiswa' => $penerima_biasiswa]);    

	//return view('profilepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


