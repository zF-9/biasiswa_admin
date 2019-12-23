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
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;


//route to validate if the profile page takes Admin || User 
Route::get('/profilepage', 'HomeController@AdminProfile')->middleware('ProfileMiddleware');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/datatable', function () {
    //return view('datatable');
    $penerima_biasiswa = DB::table('applicants')->get();
    $data_student = DB::table('up_documents')->get();

    return view('Admin.datatable', ['penerima_biasiswa' => $penerima_biasiswa, 'data_student' => $data_student]); 


});
//Route::get('/datatable', '<NewController>@MethodName');

Route::get('/Userpayment_rec', function () {
    //check org yg tgh login:now()
    $id = Auth::User()->id;

    $user_record = DB::table('payment_records')->where('payment_id', '=', $id)->first();   
    
    if($user_record == null) {
        return Redirect()->route('user-dashboard')->withErrors(['User belum kena approve lagi']);
    }
    else {
        //route to record pembayaran
        $payments = DB::table('payment_records')->get();

        return view('User.userPymnt_record', ['payment' => $payments]);          
    }
  
});
//Route::get('/Userpayment_rec', '<NewController>@MethodName');

Route::get('/payment_rec', function () {
    //route to record pembayaran
    $payments = DB::table('payment_records')->get();

    return view('Admin.record_pmbyrn', ['payment' => $payments]);    
});
//Route::get('/payment_rec', '<NewController>@MethodName');

Route::post('update_pyrec', 'ApplicantController@update_payment');

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
    $id = Auth::User()->id;

    $user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();
    //$profile_id = Applicant::find($id)->index();

    if($user_profile == null){
        //return view('dashboard')->withStatus(__('User belum bikin lagi permohonan'));
        return Redirect::back()->withErrors(['User belum bikin lagi permohonan kali','']);
    }
 
    else {
        return view('profilepage', ['user_profile' => $user_profile]);          
    }
        
})->name('profile');
//Route::get('/profile', '<NewController>@MethodName');

Route::get('/admndboard', function() {
    $penerima_biasiswa = DB::table('applicants')->get();

    $deg_p = DB::table('applicants')->where('AkademikLvl', '=', 'Sarjana Muda')->get();
    $mstr_p = DB::table('applicants')->where('AkademikLvl', '=', 'Sarjana')->get();
    $phd_p = DB::table('applicants')->where('AkademikLvl', '=', 'Doktor Falsafah')->get();

    //so, everything yg load d admin dashboard perlu kena parse di Method yg ini

    return view('Admin.datatable', ['penerima_biasiswa' => $penerima_biasiswa, 'degree' => $deg_p, 'master' => $mstr_p, 'phd' => $phd_p]);    
});


Route::get('/cubatrytest', 'ApplicantController@testing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route to validate if the user is admin or bukan 
Route::get('/dashboard', 'HomeController@Admin')->middleware('AdminMiddleware');

<<<<<<< HEAD
=======




>>>>>>> staging
