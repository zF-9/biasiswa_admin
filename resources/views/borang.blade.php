@extends('layout.main_User')
@section('content')

<div class="row justify-content-center">
  <div class="col-xl-9 col-lg-9">

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
                      <input name="nama" type="text" class="form-control form-control-user" id="InputNama" aria-describedby="emailHelp" placeholder="Nama Pemohon">
                    </div>
                    <div class="form-group">
                      <input name="email" type="text" class="form-control form-control-user" id="InputEmail" placeholder="Alamat Email">
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