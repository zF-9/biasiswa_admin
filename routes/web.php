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
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/datatable', function () {
    //return view('datatable');
    $penerima_biasiswa = DB::table('applicants')->get();

    return view('Admin.datatable', ['penerima_biasiswa' => $penerima_biasiswa]);    
});

Route::get('/login', function () { 
    return view('login');
});

Route::get('/register', function() {
	return view('register');
});

Route::get('/permohonan_baru','ApplicantController@apply');
Route::post('/permohonan_baru', 'ApplicantController@store');

Route::get('/muatnaik','ApplicantController@upload_doc');
Route::post('/muatnaik', 'ApplicantController@upload');

Route::get('/dashboard_admin', function() {
	return view('dashboard_admin');
});

Route::get('/dashboard_user', function() {
    return view('User.dashboard_user');
});

Route::get('/form', function() {
	return view('form');
});

Route::get('/404', function() {
    return view('404');
});

Route::get('/profile', function() {
	//fetch semua yang ada dlm table 'applicants' 
    $penerima_biasiswa = DB::table('applicants')->get();
    //to fetch specific row dri table (where -> arguement yg paling last tu yg kena query dari database ):
    //$penerima_biasiswa = Applicant::find($applicant->id);
    return view('/profilepage', ['penerima_biasiswa' => $penerima_biasiswa]);    

	//return view('profilepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route to validate if the user is admin or bukan 
Route::get('/dashboard', 'HomeController@Admin')->middleware('AdminMiddleware');


//route to validate if the profile page takes Admin || User 
Route::get('/profilepage', 'HomeController@AdminProfile')->middleware('ProfileMiddleware');

