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
use GuzzleHttp\Client;
use App\Mail\Mailtrap;
use App\tanggungan_pelajar;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

//test email
Route::get('/send-email', 'HomeController@mail');  
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendattachmentemail','MailController@attachment_email');
//test email

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
Route::post('/pengajian', 'ApplicantController@upload'); ///{data_id}

Route::get('/editinfopegawai/{id}','ApplicantController@pegawai_update');
Route::get('/editinfopengajian/{id}', 'ApplicantController@pengajian_update');
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
Route::post('/rec_tanggung', 'ApplicantController@tanggungan_rec');

//Route::post('/updateBudget/{req}', 'AdminController@update_budget');
Route::get('/prototype', 'UserController@proto');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile_edit', function() {
    return view('User.profile_edit');
 


//Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');

});

Route::post('/destroy/{id}', 'AdminController@destroy_pemohon');

Route::group(['middleware' => 'AdminMiddleware'], function() {
	Route::get('/boards', 'AdminController@filtered_view')->name('board');
	Route::get('/Settings', 'AdminController@Admin_settings')->name('setting');
	Route::post('/save_setting', 'AdminController@store_settings');
	Route::get('/protoadmin', 'AdminController@stats_protoype');
	Route::get('/dashboard', 'AdminController@AdminDashboard')->name('dashboard');
	Route::get('/datatable_tuntutan', 'AdminController@viewTuntutan')->name('table_tuntutan');
	Route::get('/datatable_pemohon', 'AdminController@dataPemohon')->name('table_pemohon');
	Route::get('/datatable_pelajar', 'AdminController@dataPelajar')->name('table_pelajar');
	Route::get('sendhtmlemail/{data}','MailController@succeed_email')->name('email-lulus');
	Route::get('sendemail/{data}','MailController@failed_email')->name('email-gagal');
	Route::get('/payment_rec/{id}', 'AdminController@payment_record');
	Route::post('/update_pyrec/{id}/{pid}', 'AdminController@update_payment');
	Route::get('/status_update/{data}', 'AdminController@update_status');
	Route::get('/{ticket}/{info}/{data}', 'AdminController@payment_claim');
	Route::get('/approve/{student_id}', 'AdminController@approve_pelajar');
	Route::get('/disapprove/{student_id}', 'AdminController@disapprove_pelajar');
	Route::get('/update_cost', 'AdminController@add_elaun');
	//Route::get('/{user_name}/{user_data}', 'AdminController@profile_AMSAN')->name('AMLSAN');
	//Route::get('/{data_app}', 'AdminController@profile_view')->name('profile_viewer');
	Route::get('/{user_name}/{user_data}', [
	    'as' => 'AMLSAN', 
	    'uses' => 'AdminController@profile_AMSAN'
	]);
	Route::get('/{data_app}', [
	    'as' => 'profile_viewer', 
	    'uses' => 'AdminController@profile_view'
	]);
});

Route::get('/test', 'ChartDataController@getthejumlah');





