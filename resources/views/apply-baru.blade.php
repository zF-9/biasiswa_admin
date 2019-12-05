@extends('layout.main_User')

@section('content')

<div id="content-wrapper" class="d-flex flex-column">
<div class="container-fluid mt--7">

<div class="row">
  <div class="col-xl-12 col-lg-12">

    <!--<div class="container">-->

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0  justify-content-center">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-7">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">BORANG PERMOHONAN</h1>
                  </div>
                  <!--<form class="user">-->
                  <form class="user" method="post" action="/permohonan_baru" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}

                    <div class="form-group">
                      <input name="nama" type="text" class="form-control form-control-user" id="InputNama" aria-describedby="emailHelp" value="{jhadfbldsfuhasdf" placeholder="Nama Pemohon">
                    </div>
                    <div class="form-group">
                      <input name="email" type="text" class="form-control form-control-user" id="InputEmail" value="{ auth()->user()->email }}" placeholder="Alamat Email">
                    </div>
                    <div class="form-group">
                      <input name="nokp" type="text" class="form-control form-control-user" id="InputKp" maxlength="14" placeholder="Nombor Kad Pengenalan: xxxxxx-xx-xxxx">
                    </div>
                    <div class="form-group">
                      <input name="jabatan" type="text" class="form-control form-control-user" id="InputJabatan" placeholder="Nama Agensi/Jabatan">
                    </div>
                    <div class="form-group">
                      <input name="jawatan" type="text" class="form-control form-control-user" id="InputJawatan" placeholder="Jawatan">
                    </div>
                    <div class="form-group">
                      <input name="bidang" type="text" class="form-control form-control-user" id="InputBidang" placeholder="Bidang Dalam Jawatan">
                    </div>
                    <div class="form-group">
                      <input name="Gred" type="text" class="form-control form-control-user" id="InputGred" placeholder="Gred">
                    </div>
                    <div class="form-group">
                      <input name="pengajian" type="text" class="form-control form-control-user" id="Input" placeholder="Pengajian Yang Dipohon">
                    </div>

                    <!--<div class="form-group form-control-user">
                      <label>Selects</label>
                        <select class="form-control" placeholder="Pilih la yang mana satu">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>-->

                    <div class="form-group">
                      <input name="universiti" type="text" class="form-control form-control-user" id="InputUni" placeholder="Nama Universiti">
                    </div>
                    <div class="form-group">
                      <input name="akademik" type="text" class="form-control form-control-user" id="InputAkademik" placeholder="Kelulusan Akademik">
                    </div>
                    <div class="form-group">
                      <input name="telno" value="+60" type="text" class="form-control form-control-user" id="InputFon" placeholder="Nombor Telefon">
                    </div>
                    <div class="form-group">
                      <input name="tarikhlantik" type="text" class="form-control form-control-user date" id="InputTlantik" placeholder="Tarikh Perlantikan">
                    </div>
                    <!--<div class="form-group">
                      <input name="bidang" type="text" class="form-control form-control-user" id="InputBidang" placeholder="Bidang">
                    </div>-->
                    <!--<a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>-->
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Save') }}</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="">Profile Page</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="">Update Borang Permohonan</a>
                  </div>
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


<!-- Start of Upload Document -->
<div class="row">
  <div class="col-xl-12 col-lg-12">

    <!--<div class="container">-->

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-7 ">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Muat Naik Dokumen</h1>
                  </div>
 
                  <form class="user" method="post" action="/muatnaik" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}


                  <div class="col-sm-12 col-md-9">
                      <div class="form-group">
                          <input id="statustw" type="checkbox" onclick="togglediv('uploadstatw')" name="is_ok[]" />
                              <label class="form-control-label" for="input-tawaran" >
                                  {{ __('Surat tawaran daripada Universiti') }}
                              </label>
                      </div>
                      <div id="uploadstatw">
                          <label class="stuni form-control-label" for="input-tawaran">{{ __('Surat Tawaran') }}</label>
                              <div class="col-sm-9" style="padding-left: 0px;padding-top: 9px;padding-bottom: 12px">
                                  <input name="tawaran" type="file" id="input_tawaran" class="custom-file-inputform-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>
                                  <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                              </div>
                      </div>
                  </div>

                  <div class="surat-akuan col-sm-12 col-md-9" style="align:center">
                      <label class="form-control-label" for="input_surakuan">{{ __('Surat Perakuan Dari Ketua Jabatan') }}</label>
                      <div class="col-sm-9" style="padding-left: 0px;padding-top: 12px">
                          <input name="surakuan" type="file" id="input-surakuan" class="custom-file-inputform-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>
                              <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                      </div>
                  </div>                                                              

                  <div class="text-right ol-sm-12 col-md-9">
                      <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                  </div>

              </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>
<!-- End of Upload Document -->




  <!--<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-8">-->
    
  </div>
</div>  
@endsection