<?php

namespace App\Http\Controllers;

use App\applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{

    public function store() 
    {
        $applicant = new applicant; 
        
        $applicant->nama = request('nama');
        $applicant->email = request('email');
        $applicant->nokp = request('nokp');
        $applicant->jabatan = request('jabatan');
        $applicant->jawatan = request('jawatan');
        $applicant->bidang = request('bidang');
        $applicant->universiti = request('universiti');
        $applicant->telno = request('telno');
        $applicant->akademik = request('akademik');
        $applicant->Gred = request('Gred');
        $applicant->pengajian = request('pengajian');
        //ini aku x berapa sure
        //$applicant->perlantikan = request(DateTime::createFromFormat('m/d/Y',perlantikan););
        $applicant->tarikhlantik = request('tarikhlantik');
        $applicant->save();
        return view('profilepage');
    }

    public function upload() {
        $applicant_data = new applicant; 

        $applicant_data->tawaran = request()->file('tawaran')->store('public/uploadocs');
        $applicant_data->surakuan = request()->file('surakuan')->store('public/uploadocs');

         $applicant_data->save();
    }

    public function apply()
    {
        return view('apply-baru');
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
