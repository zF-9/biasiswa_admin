<?php

namespace App\Http\Controllers;

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
        return Redirect()->route('profile');
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
        return Redirect()->route('profile');
    }

    public function update_payment() {
        $new_record = new payment_records;

        $new_record-> date_pymnt = request('date');
        $new_record-> No_baucer = request('baucer_no');
        $new_record-> Amount = request('jumlah');
        $new_record-> jenis_pymnt = request('perkara');

        $new_record->save();

        //return balik pi record pembayaran: let the admin pindah page sendiri
        //return Redirect()->route('');
        return Redirect::back();

    }    

    public function apply()
    {
        return view('User.borang');
    }

    public function upload_doc() 
    {
        return view('User.muatnaik');
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
            $user = Auth::User();
            dd($user);

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
