@extends('User.layout.main_User')
@section('content')


<div id="content-wrapper" class="d-flex flex-column">
<div class="container-fluid mt--7">

<!-- Start of Upload Document -->
<div class="row">
  <div class="col-xl-12 col-lg-12">

    <!--<div class="container">-->

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-9 col-lg-9 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-12 ">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Kemaskini Maklumat Pengajian</h1>
                  </div>
 

                  <!--<input type="hidden" name="_token" value="cGwjqp3ej0EOJP4ZWs4bZmCPj6Ngprk7WNXgmkUh">-->


                  <div class="col-lg-12 col-sm-12 col-md-12">
                      <div class="form-group">

                  <form class="user" method="post" action="/" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}
                      <div class="row">
                        <div class="form-group col-lg-6">
                        <div class="form-group">
                            <label>Kursus Yang Dipohon</label>
                              <select name="AppliedKursus" class="form-group form-control-user" id="course" placeholder="Pilih la yang mana satu"><!-- onchange="course_validation()" -->
                                <option value="Sarjana Muda">Sarjana Muda</option>
                                <option id="mstr_sel" value="Sarjana">Sarjana</option>
                                <option id="phd_sel" value="Doktor Falsafah">Doktor Falsafah</option>
                              </select>
                          </div>
                        </div>
                        <i></i>
                        <div class="form-group col-lg-8">
                        <div class="form-group">
                            <label>Nama Kursus</label>
                            <input name="course" type="text" class="form-control form-control-user" id="Input_course" value="{{ $maklumat->course }}">
                          </div>
                        </div>
                      </div>

                      <div class="row" style="align:center">

                        <div class="form-group col-lg-6">
                          <div class="form-group">
                            <label>Tarikh Mula Pengajian</label>
                            <input name="startStudy" type="text" class="form-control form-control-user date" id="InputMulaStudy" maxlength="10" value="{{ $maklumat->startStudy }}" placeholder="Tarikh Mula: xx-xx-xxxx">
                          </div> 
                        </div> 

                        <div class="form-group col-lg-6">
                          <div class="form-group">
                            <label>Tarikh Tamat Pengajian</label>
                            <input name="EndStudy" type="text" class="form-control form-control-user date" id="InputTamatStudy" maxlength="10" value="{{ $maklumat->EndStudy }}" placeholder="Tarikh Tamat: xx-xx-xxxx">
                          </div> 
                        </div> 

                      </div>
                      

                      <div class="row">
                        <div class="form-group col-lg-6">
                        <div class="form-group">
                            <label>Mod Pengajian</label>
                              <select name="study_mod" class="form-group form-control-user" id="stdy" placeholder="Pilih la yang mana satu"> <!-- onchange="study_m0de()" -->
                                <option></option>
                                <option id="ftime" value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group col-lg-6">
                        </div>
                        <div class="form-group col-lg-8" id="">
                          <div class="form-group">
                            <label>Universiti</label>
                            <input name="Uni_name" type="text" class="form-control form-control-user" id="Input_uni" placeholder="Nama Universiti" value="{{ $maklumat->Uni_name }}">
                          </div>
                        </div>                                         
                      </div>

                      <div class="row">
                        <div class="form-group col-lg-8" id="nama_u_form">
                          
                        </div>   
                      </div>

                      <div class="row">
                        <div class="form-group col-lg-4">
                          <div class="form-group">
                            <label>Pilihan Negara/Negeri</label>
                              <select name="tmpt_study" class="form-group form-control-user" id="place_stdy" placeholder="Pilih la yang mana satu" value="{{ $maklumat->tmpt_study }}">
                                <option id="os" value="Luar Negara">Luar Negara</option>
                                <option id="loc_c" value="Luar Negeri Sabah">Luar Negeri Sabah</option>
                                <option value="Dalam Negeri Sabah">Dalam Negeri Sabah</option>
                              </select>
                          </div>
                        </div>
                      </div>              
            </div>
          </div>

              
                  <div class="surat-tawaran col-sm-12 col-md-9" style="align:center">
                      <div id="uploadstatw"> <!-- style="display: none" -->
                          <label class="stuni form-control-label" for="input-tawaran">Surat Tawaran Dari Universiti</label>
                              <div class="col-sm-9" style="padding-left: 0px;padding-top: 9px;padding-bottom: 12px">
                                  <input name="tawaran" type="file" id="input_tawaran" class="custom-file-inputform-control form-control-alternative" placeholder="" value="" required="" autofocus="">
                                  <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                              </div>
                      </div>
                  </div>

                  <div class="surat-akuan col-sm-12 col-md-9" style="align:center; padding-top: 12px">
                      <label class="form-control-label" for="input_surakuan">Surat Perakuan Dari Ketua Jabatan</label>
                      <div class="col-sm-9" style="padding-left: 0px;padding-top: 9px">
                          <input name="surakuan" type="file" id="input-surakuan" class="custom-file-inputform-control form-control-alternative" placeholder="" value="" required="" autofocus="">
                              <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                      </div>
                  </div>                                                              

                  <div class="text-right ol-sm-12 col-md-12">
                      <button id="apply_btn" type="submit" class="btn btn-primary mt-4">Kemaskini</button>
                  </div>

               @csrf
              </form>
            </div>
            </div>
                  <script type="text/javascript">
                      var course_def =  "{{ $maklumat->AppliedKursus }}";
                      var studymode = "{{ $maklumat->mod_pengajian }}";

                      var options = document.getElementById("course").options;
                      for (var i = 0; i < options.length; i++) {
                        if (options[i].text == course_def) {
                          options[i].selected = true;
                          break;
                        }
                      }

                      var options = document.getElementById("stdy").options;
                      for (var i = 0; i < options.length; i++) {
                        if (options[i].text == studymode) {
                          options[i].selected = true;
                          break;
                        }
                      }
                  </script>
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
    
  <!--</div>
</div> -->
@endsection


