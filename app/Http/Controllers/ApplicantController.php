<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\applicant;
use App\upDocuments;
use App\payment_record;
use App\info_Pengajian;
use App\tanggungan_pelajar;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class ApplicantController extends Controller
{

    public function store() 
    {
        $applicant = new applicant; 

        $alamat_1 = request('alamat_1');
        $alamat_2 = request('alamat_2');
        $full_alamat = $alamat_1 . ' ' . $alamat_2;
        
        $applicant->nama = request('nama');
        $applicant->nokp = request('nokp');
        $applicant->trkhlahir = request('trkhlahir');
        $applicant->umur = request('umur');
        $applicant->tarafkahwin = request('tarafkahwin');
        $applicant->telno = request('telno');
        $applicant->telnoPej = request('telnoPej');
        $applicant->alamat = $full_alamat;
        $applicant->email = request('email');
        $applicant->jabatan = request('jabatan');
        $applicant->tarikhlantik = request('tarikhlantik');
        $applicant->tberkhidmat = request('tberkhidmat');
        $applicant->jawatan = request('jawatan');
        $applicant->skim = request('skim');
        $applicant->Gred = request('Gred');
        $applicant->TarafLantik = request('TarafLantik');
        $applicant->Tsahjwtn = request('Tsahjwtn');
        $applicant->Tahun1LPPT = request('Tahun1LPPT');
        $applicant->Tahun2LPPT = request('Tahun2LPPT');
        $applicant->Tahun3LPPT = request('Tahun3LPPT');
        $applicant->AkademikLvl = request('AkademikLvl');
        $applicant->AkademikInfo = request('AkademikInfo');

        $applicant->user_id = auth()->user()->id;

        $applicant->save();

        return Redirect()->route('user-dashboard');
    }

    public function upload() {
        $applicant_data = new info_Pengajian;
    
        $applicant_data->startStudy = request('startStudy');
        $applicant_data->EndStudy = request('EndStudy');
        $applicant_data->AppliedKursus = request('AppliedKursus');
        $applicant_data->mod_pengajian = request('study_mod');
        $applicant_data->tmpt_study = request('tmpt_study');

        $uni_1 = request('Uni_name');
        $uni_2 = request('Uni_named');

        $Uni_name = $uni_1 . ' ' . $uni_2;
        $applicant_data->Uni_name = $Uni_name;
        $applicant_data->course = request('course');
                
        $applicant_data->tawaran = request()->file('tawaran')->store('public/uploadocs');


        $applicant_data->surakuan = request()->file('surakuan')->store('public/uploadocs');
        $applicant_data->applicant_id = auth()->user()->id;
        
        $applicant_data->save();

        $tanggungan_data_1 = new tanggungan_pelajar;

        $tanggungan_data_1->tanggung_nama = request('tanggung_nama');
        $tanggungan_data_1->tanggung_hubungan = request('tanggung_hubungan');
        $tanggungan_data_1->tanggung_nokp = request('tanggung_nokp');
        $tanggungan_data_1->tanggung_umur = request('tanggung_umur');
        $tanggungan_data_1->student_id = auth()->user()->id;

        $tanggungan_data_2 = new tanggungan_pelajar;

        $tanggungan_data_2->tanggung_nama = request('tanggung_nama_2');
        $tanggungan_data_2->tanggung_hubungan = request('tanggung_hubungan_2');
        $tanggungan_data_2->tanggung_nokp = request('tanggung_nokp_2');
        $tanggungan_data_2->tanggung_umur = request('tanggung_umur_2');
        $tanggungan_data_2->student_id = auth()->user()->id;

        $tanggungan_data_3 = new tanggungan_pelajar;

        $tanggungan_data_3->tanggung_nama = request('tanggung_nama_3');
        $tanggungan_data_3->tanggung_hubungan = request('tanggung_hubungan_3');
        $tanggungan_data_3->tanggung_nokp = request('tanggung_nokp_3');
        $tanggungan_data_3->tanggung_umur = request('tanggung_umur_3');
        $tanggungan_data_3->student_id = auth()->user()->id;

        $tanggungan_data_4 = new tanggungan_pelajar;

        $tanggungan_data_4->tanggung_nama = request('tanggung_nama_4');
        $tanggungan_data_4->tanggung_hubungan = request('tanggung_hubungan_4');
        $tanggungan_data_4->tanggung_nokp = request('tanggung_nokp_4');
        $tanggungan_data_4->tanggung_umur = request('tanggung_umur_4');
        $tanggungan_data_4->student_id = auth()->user()->id;                


        /*if($tanggungan_data_4 != null) {
          dd([$tanggungan_data_1, $tanggungan_data_2, $tanggungan_data_3, $tanggungan_data_4]);
          //dd([$tanggungan_data_1, $tanggungan_data_2, $tanggungan_data_3]);
          //dd([$tanggungan_data_1, $tanggungan_data_2, $tanggungan_data_3, $tanggungan_data_4]);
          //$tanggungan_data_1->save();
          //$tanggungan_data_2->save();
          //$tanggungan_data_3->save();
          //dd("yeah on the right path");
        }
        else if($tanggungan_data_4 == null) {
          dd([$tanggungan_data_1, $tanggungan_data_2, $tanggungan_data_3]);
          //$tanggungan_data_1->save();
          //$tanggungan_data_2->save();          
        }
        else if($tanggungan_data_3 == null) {
          dd([$tanggungan_data_1, $tanggungan_data_2]);
         // $tanggungan_data_1->save();
        }
        else if($tanggungan_data_2 == null) {
          dd([$tanggungan_data_1]);
          /*$tanggungan_data_1->save();
          $tanggungan_data_2->save();
          $tanggungan_data_3->save();
          $tanggungan_data_4->save();
        }
        else if($tanggungan_data_1 == null) {
          dd("xda apa2 yang kena save");
          /*$tanggungan_data_1->save();
          $tanggungan_data_2->save();
          $tanggungan_data_3->save();
          $tanggungan_data_4->save();
        }*/

        $tanggungan_data_1->save();
        $tanggungan_data_2->save();
        $tanggungan_data_3->save();
        $tanggungan_data_4->save();

      return Redirect()->route('user-dashboard');
    }

    public function apply()
    {
        $id = Auth::User()->id;

        $user_noti = payment_record::where('payment_id', '=', $id)->get();    

        $user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();

        if($user_profile == null){
            return view('User.borang', ['user_noti' => $user_noti]);
        }
        else {
            return view('User.dashboard_user', ['user_noti' => $user_noti])->withErrors(__('Permohonan Telah Dibuat, Sila Kemas Kini'));
        }
        
    }

    public function upload_doc() 
    {
        $id = Auth::User()->id; 
        /*$toggler = DB::table('Toggle_Index')->get('index');

        if($toggler[0]->index == '1') { // condition #1: filter criterea #1
          dd("yes ngam sini: no-1");
        }
        else if ($toggler[0]->index == '2') { // condition #2: filter criterea #2
          dd("yes ngam sini: no-2");
        }
        else if ($toggler[0]->index == '3') { // condition #3: filter criterea #3
          dd("yes ngam sini: no-3");
        }*/        
        $toggle = DB::table('Toggle_Index')->where('id', '=', '42')->get();
        $toggler = $toggle[0]->index;


        $user_noti = payment_record::where('payment_id', '=', $id)->get(); 
        $user_profile = DB::table('info__pengajians')->where('applicant_id', '=', $id)->first();

        if($user_profile == null){
            $check_info = applicant::where('user_id', '=', $id)->first();

            if($check_info == null) {
              //else {
                return view('User.dashboard_user', ['user_noti' => $user_noti])->withErrors(__('Sila penuhkan maklumat pegawai')); 
              //}
            }
            else {

              $user_data = DB::table('applicants')->where('user_id', '=', $id)
              ->join('users', 'users.id', 'applicants.user_id')
              ->first();

              $avg_marks = applicant::where('user_id', '=', $id)
              ->sum(DB::raw('Tahun1LPPT + Tahun2LPPT + Tahun3LPPT'));

              $user_noti = payment_record::where('payment_id', '=', $id)->get();  

              if($toggler == '1') {
                return view('User.borang_fullfilter', ['user_data' => $user_data, 'avg' => $avg_marks, 'user_noti' => $user_noti]); 
              }
              else if ($toggler =='2') {
                return view('User.borang_studyfilter', ['user_data' => $user_data, 'avg' => $avg_marks, 'user_noti' => $user_noti]); 
              }
              else if ($toggler =='2') {
                return view('User.borang_default', ['user_data' => $user_data, 'avg' => $avg_marks, 'user_noti' => $user_noti]); 
              }
              else {
                return view('User.borang_default', ['user_data' => $user_data, 'avg' => $avg_marks, 'user_noti' => $user_noti]);                
                //dd($avg_marks);
              }
               
            }
            //dd($user_data);
        } 
        else {
            return view('User.dashboard_user', ['user_noti' => $user_noti])->withErrors(__('Maklumat Telah Dimuat naik, Sila Kemas Kini'));           
        }       
        
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }

    public function testing() {
        $results = User::with('user')->get();
           
        dd($results);
    }

    public function update_maklumat($id) {
        $id_data = Auth::User()->id;

        $maklumat = applicant::where('nokp', '=', $id)->first();
        $user_noti = payment_record::where('payment_id', '=', $id_data)->get();   
           
       // dd($maklumat);
        return view('User.editmaklumat', ['maklumat' => $maklumat, 'user_noti' => $user_noti]);
    }

    public function newstore($id) {

        $new_data = applicant::where('user_id', '=', $id)->first();

        $alamat_1 = request('alamat_1');
        $alamat_2 = request('alamat_2');
        $full_alamat = $alamat_1 . ' ' . $alamat_2;

        $new_data-> nama = request('nama');
        $new_data->  nokp = request('nokp');
        $new_data->  trkhlahir = request('trkhlahir');
        $new_data->  umur = request('umur');
        $new_data-> tarafkahwin = request('tarafkahwin');
        $new_data-> telno = request('telno');
        $new_data-> telnoPej = request('telnoPej');
        $new_data-> alamat = $full_alamat;
        $new_data-> jabatan = request('jabatan');
        $new_data-> tarikhlantik = request('tarikhlantik');
        $new_data-> tberkhidmat = request('tberkhidmat');
        $new_data-> jawatan = request('jawatan');
        $new_data-> skim = request('skim');
        $new_data-> Gred = request('Gred');
        $new_data-> TarafLantik = request('TarafLantik');
        $new_data-> Tsahjwtn = request('Tsahjwtn');
        $new_data-> Tahun1LPPT = request('Tahun1LPPT');
        $new_data-> Tahun2LPPT= request('Tahun2LPPT');
        $new_data-> Tahun3LPPT = request('Tahun3LPPT');

        $new_data->save();

        return Redirect()->route('full_profile');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(applicant $applicant)
    {
        //
    }
}
