@extends('layout.User.main_User')
<script type="text/javascript">
  var gred = '{{ $user_data -> Gred }}';
  var age = '{{ $user_data -> umur }}';
  var service = '{{ $user_data -> tberkhidmat }}';
  var appoint = '{{ $user_data -> TarafLantik }}';

  //alert(appoint);

  //window.onload=function() { 
    if(appoint == "Kontrak") {
      //document.getElementById("nama_u_form").disabled = true;
      alert(appoint);
    }
    else {
      //document.getElementById("Option_uni").disabled = true;
      alert("ohohohoh");
    }
  //}
  
  function course_validation() {
    var x = document.getElementById("course").value;

    if (service >= 2) {
      if(x == '0') {
        alert("please select kursus pengajian");
      }

      else if(x == '1' && gred <= 36) {
        if (age <= 35) {
          alert("layak ba klu kau, bo55ku");
        }
      }
        
      else if(x == '2' && gred < 41){
        if(age <= 45){
          alert("Anda tidak layak untuk memohon");
          document.getElementById("apply_btn").disabled = true;
        }
      }

      else if(x == '3' && gred < 41){
        if(age <= 45){
          alert("Anda tidak layak untuk memohon");
          document.getElementById("apply_btn").disabled = true;
        }
      }
    }
    //ini kalau tahun berkhidmat dia under < 2
    else {
      alert("Anda tidak layak untuk memohon");
      document.getElementById("apply_btn").disabled = true;
    }
  }
</script>
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
                    <h1 class="h4 text-gray-900 mb-4">Muat Naik Dokumen</h1>
                  </div>
 

                  <!--<input type="hidden" name="_token" value="cGwjqp3ej0EOJP4ZWs4bZmCPj6Ngprk7WNXgmkUh">-->


                  <div class="col-lg-12 col-sm-12 col-md-12">
                      <div class="form-group">

                  <form class="user" method="post" action="/muatnaik" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}
                      <div class="row">
                        <div class="form-group col-lg-6">
                          <div class="form-group">
                            <label>Kelulusan Akademik</label>
                              <select name="AkademikLvl" class="form-group form-control-user" placeholder="Pilih la yang mana satu">
                                <option>SPM</option>
                                <option>Diploma</option>
                                <option>Sarjana Muda</option>
                                <option>Sarjana</option>
                                <option>Doktor Falsafah</option>
                              </select>
                          </div>
                        </div>
                        <i></i>
                        <div class="form-group col-lg-8">
                          <div class="form-group">
                            <label>*Sila Nyatakan Kelulusan Akademik</label>
                            <input name="AkademikInfo" type="text" class="form-control form-control-user" value="" id="InputAkademik" placeholder="akademik">
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="form-group col-lg-6">
                          <div class="form-group">
                            <label>Kursus Yang Dipohon</label>
                              <select name="AppliedKursus" onchange="course_validation()" class="form-group form-control-user" id="course" placeholder="Pilih la yang mana satu">
                                <option value="0"></option>
                                <option value="1">Sarjana Muda</option>
                                <option value="2">Sarjana</option>
                                <option value="3">Doktor Falsafah</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group col-lg-8">
                          <div class="form-group" id="nama_u_form">
                            <label>Universiti</label>
                            <input name="Uni_name" type="text" class="form-control form-control-user" id="Input_uni" placeholder="Nama Universiti">
                          </div>
                        </div>   
                        <div class="form-group col-lg-4">
                          <div class="form-group">
                            <label>Universiti</label>
                              <select name="Uni_name" onchange="" class="form-group form-control-user" id="Option_uni">
                                <option value="0"></option>
                                <option value="1">UTM Space</option>
                                <option value="2">PLUMS</option>
                              </select>
                          </div>
                        </div>                                        
                      </div>

                      <div class="row">
                        <div class="form-group col-lg-4">
                          <div class="form-group">
                            <label>Pilihan Negara/Negeri</label>
                              <select name="tmpt_study" class="form-group form-control-user" id="place_stdy" placeholder="Pilih la yang mana satu">
                                <option>Luar Negara</option>
                                <option>Luar Negeri Sabah</option>
                                <option>Dalam Negeri Sabah</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-lg-4">
                          <div class="form-group">
                            <label>Mod Pengajian</label>
                              <select name="study_mod" class="form-group form-control-user" id="stdy" placeholder="Pilih la yang mana satu">
                                <option></option>
                                <option>Sepenuh Masa</option>
                                <option data-sync="2">Separuh Masa</option>
                              </select>
                          </div>
                        </div>
                      </div>

                      <div class="row" style="align:center">

                        <div class="form-group col-lg-6">
                          <div class="form-group">
                            <label>Tarikh Mula Pengajian</label>
                            <input name="startStudy" type="text" class="form-control form-control-user date" id="InputMulaStudy" maxlength="10" placeholder="Tarikh Mula: xx-xx-xxxx">
                          </div> 
                        </div> 

                        <div class="form-group col-lg-6">
                          <div class="form-group">
                            <label>Tarikh Tamat Pengajian</label>
                            <input name="EndStudy" type="text" class="form-control form-control-user date" id="InputTamatStudy" maxlength="10" placeholder="Tarikh Tamat: xx-xx-xxxx">
                          </div> 
                        </div> 

                      </div>
                      

                      <div class="row">
                        <input id="statustw" type="checkbox" onclick="togglediv('uploadstatw')" name="is_ok[]">
                            <label class="form-control-label" style="margin:3px 9px 0px 6px" for="input-tawaran">
                                  Surat tawaran daripada Universiti
                            </label>
                      </div>

                  <div class="surat-tawaran col-sm-12 col-md-9" style="align:center">
                      <div id="uploadstatw" style="display: none">
                          <label class="stuni form-control-label" for="input-tawaran">Surat Tawaran</label>
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
                      <button id="apply_btn" type="submit" class="btn btn-success mt-4">Mohon</button>
                  </div>

               @csrf
              </form>
            </div>
            </div>
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
<!-- End of Upload Document -->






  <!--<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-8">-->
    
  </div>
</div>  
@endsection
