<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\applicant;
use App\upDocuments;
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

        //cara add user_id static method punya way 
        $applicant->user_id = auth()->user()->id;

        //ini aku x berapa sure
        //$applicant->perlantikan = request(DateTime::createFromFormat('m/d/Y',perlantikan););
        $applicant->save();
        //return view('/profile');
        return Redirect()->route('pemohon');
    }

    public function upload() {
        //$applicant_data = new applicant; 
        //auth()->user()->update($request->all());
        $applicant_data = new upDocuments;

        $applicant_data->startStudy = request('startStudy');
        $applicant_data->EndStudy = request('EndStudy');
        $applicant_data->AkademikLvl = request('AkademikLvl');
        $applicant_data->AkademikInfo = request('AkademikInfo');
        $applicant_data->AppliedKursus = request('AppliedKursus');
        $applicant_data->Uni_name = request('Uni_name');
        $applicant_data->tmpt_study = request('tmpt_study');

        $applicant_data->tawaran = request()->file('tawaran')->store('public/uploadocs');
        $applicant_data->surakuan = request()->file('surakuan')->store('public/uploadocs');

        //cara add user_id static method punya way 
        $applicant_data->applicant_id = auth()->user()->id;
        //use the above as -> profile pic utk user to create stu lagi column 
        //where users boleh upload pic

        $applicant_data->save();
        return Redirect()->route('pelajar');
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
        $user_profile = DB::table('up_documents')->where('applicant_id', '=', $id)->first();

        if($user_profile == null){
            return view('User.muatnaik');
        } 
        else {
            return view('User.dashboard_user')->withErrors(__('Maklumat Telah Dimuat naik, Sila Kemas Kini'));           
        }       
        
    }

    //public function attend(Request $request) {
    public function testing() {

            /*$id_pelatih = request('p_id');
            
            list_name::find($id_pelatih)->update([
                //example: '<NamaColumn dlm database>' => request('input_name');
                //'jam'=>request('p_masa'),
                //'attend'=>request('p_attend') ? true : false
            ]);
            return Redirect()->route('registration'); //re-route p mana2 route_name*/
            $results = User::with('user')->get();
            //$user = Auth::User();
            dd($results);

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
