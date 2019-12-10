@extends('layout.User.main_User')
@section('content')

<div class="row justify-content-center">
  <div class="col-xl-9 col-lg-9">

    <!--<div class="container">-->

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0" > <!-- justify-content-center -->
            <!-- Nested Row within Card Body -->
            <div class="row"> <!-- justify-content-center -->

              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">BORANG PERMOHONAN</h1>
                  </div>
                  <!--<form class="user">-->
                  <form class="user" method="post" action="/permohonan_baru" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}

                  <div class="row">
                    <div class="form-group col-lg-6">
                      <div class="form-group">
                      <label>Nama</label>
                      <input name="nama" type="text" class="form-control form-control-user" id="InputNama" value="{{ auth()->user()->name }}" aria-describedby="emailHelp" placeholder="Nama Pemohon">
                    </div>
                    </div>
                    <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>No. Kad Pengenalan</label>
                      <input name="nokp" type="text" class="form-control form-control-user" id="InputKp" maxlength="14" placeholder="Nombor Kad Pengenalan: xxxxxx-xx-xxxx">
                    </div>
                    </div>
                  </div>

                <div class="row">
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Tarikh Lahir</label>
                      <input name="trkhlahir" type="text" class="form-control form-control-user tlahir" id="Inputlahir" maxlength="10" placeholder="Tarikh Lahir: xx-xx-xxxx">
                      <input class="btn-user btn-block" type="button" id="find_age" value="calculate umur" />
                    </div> 
                  </div>               
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Umur</label>
                      <input name="umur" type="text" class="form-control form-control-user inputumur" id="InputUmur" placeholder="Umur">
                    </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Taraf Perkahwinan</label>
                        <select name="tarafkahwin" class="form-group form-control-user" placeholder="Pilih la yang mana satu">
                          <option>Bujang</option>
                          <option>Berkahwin</option>
                          <option>Janda</option>
                          <option>Duda</option>
                        </select>
                    </div>
                  </div>
                </div>  

                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>No. Telefon Peribadi</label>
                      <input name="telno" value="+60" type="text" class="form-control form-control-user" id="InputFon" placeholder="Nombor Telefon (Peribadi)">
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>No. Telefon Pejabat</label>
                      <input name="telnoPej" value="+60" type="text" class="form-control form-control-user" id="InputFonOff" placeholder="Nombor Telefon (Pejabat)">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-12">
                    <div class="form-group">
                      <label>Alamat Rumah Semasa</label>
                      <input name="alamat" type="text" class="form-control form-control-user" id="InputAlamat" placeholder="Alamat_1">
                      <input name="alamat" type="text" class="form-control form-control-user" id="InputAlamat" placeholder="Alamat_2">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" type="text" class="form-control form-control-user" id="InputEmail" value="{{ auth()->user()->email }}" placeholder="Alamat Email">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Nama Agensi/Jabatan</label>
                        <select name="jabatan" class="form-group form-control-user" placeholder="Pilih la yang mana satu">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Tarikh Perlantikan</label>
                      <input name="tarikhlantik" type="text" class="form-control form-control-user Tlantik" id="InputTlantik" placeholder="Tarikh Perlantikan">
                      <input class="btn-user btn-block" type="button" id="cal_servicey" value="calculate tahun berkhidmat" />
                    </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Tahun Berkhidmat</label>
                      <input name="tberkhidmat" type="text" class="form-control form-control-user inputKhidmat" id="InputTkhidmat" placeholder="Tahun Berkhidmat">
                    </div>
                  </div>
                </div> 


                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Jawatan Hakiki</label>
                      <input name="jawatan" type="text" class="form-control form-control-user" id="InputJawatan" placeholder="Jawatan">
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Gred</label>
                      <input name="Gred" type="text" class="form-control form-control-user" id="InputGred" placeholder="Gred">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Taraf Perlantikan</label>
                      <input  name="TarafLantik" type="text" class="form-control form-control-user" id="InputJabatan" placeholder="Taraf Perlantikan">
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Gred Dipangku</label>
                      <input  name="GredPangku" type="text" class="form-control form-control-user" id="InputJabatan" placeholder="Gred Dipangku">
                    </div>
                </div>
              </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Tarikh Pengesahan Jawatan</label>
                      <input  name="Tsahjwtn" type="text" class="form-control form-control-user date" id="InputTsahjwtn" placeholder="Tarikh Pengesahan Jawatan">
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Jawatan Dipangku (*Jika Ada)</label>
                      <input name="JwtnPangku" type="text" class="form-control form-control-user" id="InputJabatan" placeholder="Jawatan Dipangku">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Tarikh Mula</label>
                      <input name="trkhMula" type="text" class="form-control form-control-user tlahir date" id="InputMula" maxlength="10" placeholder="Tarikh Mula: xx-xx-xxxx">
                    </div> 
                  </div> 
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Tarikh Tamat</label>
                      <input name="trkhTamat" type="text" class="form-control form-control-user tlahir date" id="InputTamat" maxlength="10" placeholder="Tarikh Tamat: xx-xx-xxxx">
                    </div> 
                  </div> 
                </div>

                <div class="row">
                  <h4>Laporan Penilaian Prestasi Tahunan</h4>
                </div>
                  <div class="row">
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <div id="year_1"></div>
                      <input name="Tahun1LPPT" type="text" class="form-control form-control-user" id="InputT1" placeholder="">
                    </div>
                  </div> 
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label id="year_2"></label>
                      <input name="Tahun2LPPT" type="text" class="form-control form-control-user" id="InputT2" placeholder="">
                    </div>
                  </div>                  
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label id="year_3"></label>
                      <input name="Tahun3LPPT" type="text" class="form-control form-control-user" id="InputT3" placeholder="">
                    </div>
                  </div>  
                </div>

                    <!--<div class="form-group">
                      <input name="universiti" type="text" class="form-control form-control-user" id="InputUni" placeholder="Nama Universiti">
                    </div>
                    <div class="form-group">
                      <input name="akademik" type="text" class="form-control form-control-user" id="InputAkademik" placeholder="Kelulusan Akademik">
                    </div>

                    <div class="form-group">
                      <input name="tarikhlantik" type="text" class="form-control form-control-user date" id="InputTlantik" placeholder="Tarikh Perlantikan">
                    </div>

                    <div class="form-group">
                      <input name="tarikhsahjwtn" type="text" class="form-control form-control-user date" id="InputTsahjwtn" placeholder="Tarikh Pengesahan Jawatan">
                    </div>-->
                    

                    <!-- copy this pattern row -->
                    <div class="row">
                      <div class="form-group col-lg-6">


                      </div>
                    </div> 
                    <!-- copy this pattern row -->



                    <!--<div class="form-group">
                      <input name="bidang" type="text" class="form-control form-control-user" id="InputBidang" placeholder="Bidang">
                    </div>-->
                    <!--<a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>-->
                    <hr>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Save') }}</button>
                    </div>
                  </form>
                  <hr>
                  <!--<div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>
<!-- end of borang permohonan -->
@endsection