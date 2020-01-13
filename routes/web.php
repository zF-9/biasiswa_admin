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
use App\Dokumen_result;
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

//Route::get('/upload', function() {
//	return view('User.upload_docs');
//});//->name('');

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

Route::get('/datatable_tuntutan', 'AdminController@viewTuntutan')->name('table_tuntutan');
Route::get('/datatable_pemohon', 'AdminController@dataPemohon')->name('table_pemohon');
Route::get('/datatable_pelajar', 'AdminController@dataPelajar')->name('table_pelajar');
Route::get('/payment_rec/{id}', 'AdminController@payment_record');
Route::post('/update_pyrec/{id}', 'AdminController@update_payment');
Route::get('/tuntutan_pay/{ticket}/{info}', 'AdminController@payment_claim');
Route::get('/approve/{id}', 'AdminController@approve_pelajar');
Route::get('/profilePemohon/{user_data}', 'AdminController@profile_view')->name('profile_viewer');

Route::get('/permohonan_baru','ApplicantController@apply');
Route::post('/permohonan_baru', 'ApplicantController@store');

Route::get('/pengajian','ApplicantController@upload_doc');
Route::post('/pengajian', 'ApplicantController@upload');

Route::get('/serahan', 'UserController@doc_res');
Route::post('/serahan', 'UserController@mn_dokumen'); 

Route::get('/Userpayment_rec', 'UserController@payment_history');
Route::get('/profilePenuh', 'UserController@profile_penuh')->name('full_profile');
Route::get('/profilePemohon', 'UserController@profilePemohon')->name('profile_pemohon');
Route::get('/profilePelajar', 'UserController@profilePelajar')->name('profile_pelajar');
Route::get('/upload_docs', 'UserController@upload_docs')->name('list_docs');

Route::get('/upload_pic', 'UserController@UploadPic');
Route::post('/updateAvatar', 'UserController@update_avatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile_edit', function() {
	return view('User.profile_edit');
});






