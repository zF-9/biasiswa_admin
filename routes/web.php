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
use App\tanggungan_pelajar;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

Route::get('/chart', function () { 
    return view('testChart2');
});

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

/*Route::get('/dashboard_user', function() {
    return view('User.dashboard_user');
})->name('user-dashboard');*/



Route::get('/form', function() {
	return view('form');
});

Route::get('/404', function() {
    return view('404');
});

Route::get('/dashboard_user', 'UserController@user_dashboard')->name('user-dashboard');
Route::get('/profilepage', 'AdminController@AdminProfile')->middleware('ProfileMiddleware');
Route::get('/permohonan_baru','ApplicantController@apply');
Route::post('/permohonan_baru', 'ApplicantController@store');

Route::get('/pengajian','ApplicantController@upload_doc');
Route::post('/pengajian', 'ApplicantController@upload');

Route::get('/editmaklumat/{id}','ApplicantController@update_maklumat');
Route::post('/maklumat_baru/{id}', 'ApplicantController@newstore');


Route::get('/serahan', 'UserController@doc_res');
Route::post('/serahan', 'UserController@mn_dokumen'); 
Route::get('/exportstudent', 'UserController@exportstudent');
Route::get('/exportchart', 'UserController@exportlaporan');

Route::get('/Userpayment_rec', 'UserController@payment_history');
Route::get('/profilePenuh', 'UserController@profile_penuh')->name('full_profile');
Route::get('/profilePemohon', 'UserController@profilePemohon')->name('profile_pemohon');
Route::get('/profilePelajar', 'UserController@profilePelajar')->name('profile_pelajar');
Route::get('/upload_docs', 'UserController@upload_docs')->name('list_docs');

Route::get('/upload_pic', 'UserController@UploadPic');
Route::post('/updateAvatar', 'UserController@update_avatar');

//Route::post('/updateBudget/{req}', 'AdminController@update_budget');
Route::get('/prototype', 'UserController@proto');
Route::get('/protoadmin', 'AdminController@stats_protoype');
Route::get('/test_view', 'AdminController@ahli_view');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile_edit', function() {
    return view('User.profile_edit');
    

//Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');

});

Route::group(['middleware' => 'AdminMiddleware'], function() {
	Route::get('/Settings', 'AdminController@Admin_settings')->name('setting');
	Route::post('/save_setting', 'AdminController@store_settings');
	Route::get('/dashboard', 'AdminController@AdminDashboard')->name('dashboard');
	Route::get('/datatable_tuntutan', 'AdminController@viewTuntutan')->name('table_tuntutan');
	Route::get('/datatable_pemohon', 'AdminController@dataPemohon')->name('table_pemohon');
	Route::get('/datatable_pelajar', 'AdminController@dataPelajar')->name('table_pelajar');
	Route::get('/payment_rec/{id}', 'AdminController@payment_record');
	Route::post('/update_pyrec/{id}', 'AdminController@update_payment');
	Route::get('/{ticket}/{info}', 'AdminController@payment_claim');
	//Route::get('/approve/{id}', 'AdminController@approve_pelajar');
	Route::get('/approve/', 'AdminController@approve_pelajar');
	Route::get('/{user_data}', 'AdminController@profile_view')->name('profile_viewer');


});

Route::get('/test', 'ChartDataController@getthejumlah');





