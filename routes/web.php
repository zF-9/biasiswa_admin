<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|ü
*/
//test test test
use App\User;
use App\applicant;
use App\upDocuments;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () { 
    return view('login');
});

Route::get('/register', function() {
	return view('register');
});

Route::get('/dashboard_admin', function() {
	return view('dashboard_admin');
})->name('admin-dashboard');

Route::get('/dashboard_user', function() {
    return view('User.dashboard_user');
})->name('user-dashboard');

Route::get('/form', function() {
	return view('form');
});

Route::get('/404', function() {
    return view('404');
});

//route to validate if the user is admin or bukan 
Route::get('/dashboard', 'AdminController@AdminDashboard')->middleware('AdminMiddleware');
//route to validate if the profile page takes Admin || User 
Route::get('/profilepage', 'AdminController@AdminProfile')->middleware('ProfileMiddleware');

Route::get('/datatable_pemohon', 'AdminController@dataPemohon')->name('table_pemohon');
Route::get('/datatable_pelajar', 'AdminController@dataPelajar')->name('table_pelajar');
Route::get('/payment_rec/{id}', 'AdminController@payment_record');
Route::post('/update_pyrec/{id}', 'AdminController@update_payment');
Route::get('/approve/{id}', 'AdminController@approve_pelajar');

Route::get('/permohonan_baru','ApplicantController@apply');
Route::post('/permohonan_baru', 'ApplicantController@store');

Route::get('/muatnaik','ApplicantController@upload_doc');
Route::post('/muatnaik', 'ApplicantController@upload');

Route::get('/Userpayment_rec', 'UserController@payment_history');
Route::get('/profilePemohon', 'UserController@profilePemohon')->name('pemohon');
Route::get('/profilePelajar', 'UserController@profilePelajar')->name('pelajar');

//Route::get('/cubatrytest/{id}', 'AdminController@ApprovePelajar');
Route::get('/upload_pic', 'UserController@UploadPic');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/testing/{id}', ['uses' => 'AdminController@payment_record'] );
//Route::post('/testing/{id}', ['as' => 'user','uses' => 'AdminController@payment_record'] );



