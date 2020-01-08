<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\applicant;
use App\upDocuments;
use App\info_Pengajian;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{

    public function store() 
    {
        $applicant = new applicant; 
        
        $applicant->nama = request('nama');
        $applicant->nokp = request('nokp');
        $applicant->trkhlahir = request('trkhlahir');
        $applicant->umur = request('umur');
        $applicant->tarafkahwin = request('tarafkahwin');
        $applicant->telno = request('telno');
        $applicant->telnoPej = request('telnoPej');
        $applicant->alamat = request('alamat');
        $applicant->email = request('email');
        $applicant->jabatan = request('jabatan');
        $applicant->tarikhlantik = request('tarikhlantik');
        $applicant->tberkhidmat = request('tberkhidmat');
        $applicant->jawatan = request('jawatan');
        $applicant->Gred = request('Gred');
        $applicant->TarafLantik = request('TarafLantik');
        $applicant->GredPangku = request('GredPangku');
        $applicant->Tsahjwtn = request('Tsahjwtn');
        $applicant->JwtnPangku = request('JwtnPangku');
        $applicant->trkhMula = request('trkhMula');
        $applicant->trkhTamat = request('trkhTamat');
        $applicant->Tahun1LPPT = request('Tahun1LPPT');
        $applicant->Tahun2LPPT = request('Tahun2LPPT');
        $applicant->Tahun3LPPT = request('Tahun3LPPT');

        $applicant->user_id = auth()->user()->id;

        $applicant->save();

        return Redirect()->route('profile_pemohon');
    }

    public function upload() {
        $applicant_data = new info_Pengajian;

        $applicant_data->startStudy = request('startStudy');
        $applicant_data->EndStudy = request('EndStudy');
        $applicant_data->AkademikLvl = request('AkademikLvl');
        $applicant_data->AkademikInfo = request('AkademikInfo');
        $applicant_data->AppliedKursus = request('AppliedKursus');
        $applicant_data->mod_pengajian = request('study_mod');
        $applicant_data->tmpt_study = request('tmpt_study');
        $applicant_data->Uni_name = request('Uni_name');
        $applicant_data->Uni_namePT = request('Uni_named');
                
        $applicant_data->tawaran = request()->file('tawaran')->store('public/uploadocs');
        $applicant_data->surakuan = request()->file('surakuan')->store('public/uploadocs');

        $applicant_data->applicant_id = auth()->user()->id;
        $applicant_data->save();

        return Redirect()->route('profile_pelajar');
    }

    public function apply()
    {
        $id = Auth::User()->id;
        $user_profile = DB::table('applicants')->where('user_id', '=', $id)->first();

        if($user_profile == null){
            return view('User.borang');
        }
        else {
            return view('User.dashboard_user')->withErrors(__('Permohonan Telah Dibuat, Sila Kemas Kini'));
        }
        
    }

    public function upload_doc() 
    {
        $id = Auth::User()->id;
        $user_profile = DB::table('info__pengajians')->where('applicant_id', '=', $id)->first();

        if($user_profile == null){
            $user_data = DB::table('applicants')->where('user_id', '=', $id)
            ->join('users', 'users.id', 'applicants.user_id')
            ->first();

            $avg_marks = applicant::where('user_id', '=', $id)
            ->sum('Tahun1LPPT', 'Tahun2LPPT', 'Tahun3LPPT');

            return view('User.muatnaik', ['user_data' => $user_data, 'avg' => $avg_marks]);
            //dd($user_data);
        } 
        else {
            return view('User.dashboard_user')->withErrors(__('Maklumat Telah Dimuat naik, Sila Kemas Kini'));           
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
