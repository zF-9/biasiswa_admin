@extends('layout.User.main_User')
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
                    <h1 class="h4 text-gray-900 mb-4">Borang Maklumat Pengajian</h1>
                  </div>
 

                  <!--<input type="hidden" name="_token" value="cGwjqp3ej0EOJP4ZWs4bZmCPj6Ngprk7WNXgmkUh">-->


                  <div class="col-lg-12 col-sm-12 col-md-12">
                      <div class="form-group">

                  <form class="user" method="post" action="/pengajian" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}
                      <div class="row">
                        <div class="form-group col-lg-6">
                        <div class="form-group">
                            <label>Kursus Yang Dipohon</label>
                              <select name="AppliedKursus" onchange="course_validation()" class="form-group form-control-user" id="course" placeholder="Pilih la yang mana satu">
                                <option value="0">Sila Pilih</option>
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
                            <input name="course" type="text" class="form-control form-control-user" id="Input_course" placeholder="Nama Kursus">
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
                        <div class="form-group col-lg-6">
                        <div class="form-group">
                            <label>Mod Pengajian</label>
                              <select name="study_mod" class="form-group form-control-user" id="stdy" placeholder="Pilih la yang mana satu" onchange="study_m0de()">
                                <option>Sila Pilih</option>
                                <option id="ftime" value="Full Time">Sepenuh Masa</option>
                                <option value="Part Time">Separuh Masa</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group col-lg-6">
                        </div>
                        <div class="form-group col-lg-8" id="nama_u_form">
                          <div class="form-group">
                            <label>Universiti</label>
                            <input name="Uni_name" type="text" class="form-control form-control-user" id="Input_uni" placeholder="Nama Universiti">
                          </div>
                        </div>   
                        <div class="form-group col-lg-4" id="option_u_form">
                          <div class="form-group">
                            <label>Universiti</label>
                              <select name="Uni_named" onchange="" class="form-group form-control-user" id="Option_uni">
                                <option value="">Sila Pilih</option>
                                <option value="UTM Space">UTM Space</option>
                                <option value="PLUMS">PLUMS</option>
                              </select>
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
                              <select name="tmpt_study" class="form-group form-control-user" id="place_stdy" placeholder="Pilih la yang mana satu" onchange="cek_luarnegara()">
                                <option>Sila Pilih</option>
                                <option id="luar" value="Luar Negara">Luar Negara</option>
                                <option id="luar_neg" value="Luar Negeri Sabah">Luar Negeri Sabah</option>
                                <option value="Dalam Negeri Sabah">Dalam Negeri Sabah</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group col-lg-4">
                          <div class="form-group">
                              <label>Nama Negara</label>
                              <select name="tmpt_study1" class="form-group form-control-user" id="place_study" placeholder="Pilih la yang mana satu" onchange="cek_namanegara()">
                              <option id="" value="">Sila Pilih</option>
                                <option id="Amerika Syarikat" value="Amerika Syarikat">Amerika Syarikat</option>
                                <option id="Australia" value="Australia">Australia</option>
                                <option id="India" value="India">India</option>
                                <option id="Indonesia" value="Indonesia">Indonesia</option>
                                <option id="Jepun" value="Jepun">Jepun</option>
                                <option id="Kanada" value="Kanada">Kanada</option>
                                <option id="Korea Selatan" value="Korea Selatan">Korea Selatan</option>
                                <option id="Mesir" value="Mesir">Mesir</option>
                                <option id="New Zealand" value="New Zealand">New Zealand</option>
                                <option id="Singapore" value="Singapore">Singapore</option>
                                <option id="United Kingdom" value="United Kingdom">United Kingdom</option>
                                <option id="China" value="China">China</option>
                                <option id="Hong Kong" value="Hong Kong">Hong Kong</option>
                                <option id="Lain-lain" value="Lain-lain">Lain-lain</option>

                              </select>
                          </div>
                        </div>
                        <div class="form-group col-lg-4">
                          <div class="form-group">
                            <label>Pilihan Tempat</label>
                              <select name="tmpt_study2" class="form-group form-control-user" id="place_amerika" placeholder="Pilih la yang mana satu" onchange="">
                              <option id="os" value="Lain-lain">Sila Pilih</option>
                                <option value="Washington D.C">Washington D.C</option>
                                <option value="Los Angeles">Los Angeles</option>
                                <option value="New York City">New York City</option>
                                <option value="Chicago">Chicago</option>
                                <option value="San Francisco">San Francisco</option>
                                <option value="California">California</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="Massachusettes">Massachusettes</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="New Jersey">New Jersey</option>   
                                <option value="Philadelphia">Philadelphia</option> 
                                <option value="Pittsburgh">Pittsburgh</option>    
                                <option value="University Park">University Park</option> 
                                <option value="Atlanta">Atlanta</option> 
                                <option value="Miami">Miami</option>  
                                <option value="Houstan">Houstan</option>  
                                <option value="Dallas/Fort Worth">Dallas/Fort Worth</option>    
                                <option value="Detroit">Detroit</option>     
                                <option value="Seattle">Seattle</option>
                                <option value="Portland">Evanston</option> 
                                <option value="Park Forest">Park Forest</option>  
                                <option value="Arlington">Arlington</option>  
                                <option value="Irving">Irving</option> 
                                <option value="Coral Gables">Coral Gables</option>  
                                <option value="Lain-lain">Lain-lain</option>                                        
                              </select>
                          </div>
                          <div class="form-group">
                              <select name="tmpt_study2" class="form-group form-control-user" id="place_australia" placeholder="Pilih la yang mana satu" onchange="">
                                <option value="Lain-lain">Sila Pilih</option>
                                <option value="Sydney">Sydney</option>
                                <option value="Melbourne">Melbourne</option>
                                <option value="Perth">Perth</option>     
                                <option value="Canberra">Canberra</option> 
                                <option value="Brisbane">Brisbane</option> 
                                <option value="Lain-lain">Lain-lain</option>                                    
                              </select>
                          </div>
                          <div class="form-group">
                              <select name="tmpt_study2" class="form-group form-control-user" id="place_india" placeholder="Pilih la yang mana satu" onchange="">
                                <option value="Lain-lain">Sila Pilih</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="New Delhi">New Delhi</option>
                                <option value="Mangalore">Mangalore</option>
                                <option value="Bangalore">Bangalore</option>
                                <option value="Madras">Madras</option>
                                <option value="Manipal">Manipal</option>
                                <option value="Belgaum">Belgaum</option> 
                                <option value="Lain-lain">Lain-lain</option>                                        
                              </select>
                          </div>
                          <div class="form-group">
                              <select name="tmpt_study2" class="form-group form-control-user" id="place_indon" placeholder="Pilih la yang mana satu" onchange="">
                                <option value="Lain-lain">Sila Pilih</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Bandung">Bandung</option>
                                <option value=Bali>Bali</option>
                                <option value="Lain-lain">Lain-lain</option>                                        
                              </select>
                          </div>
                          <div class="form-group">
                              <select name="tmpt_study2" class="form-group form-control-user" id="place_japan" placeholder="Pilih la yang mana satu" onchange="">
                                <option value="Lain-lain">Sila Pilih</option>
                                <option value="Yokohama-city">Yokohama-city</option>
                                <option value="Yokosuka-city">Yokosuka-city</option>
                                <option value="Kawasaki-city">Kawasaki-city</option>
                                <option value="Kamakura-city">Kamakura-city</option>
                                <option value="zushi-city">zushi-city</option>
                                <option value="Hayama-cho,Miuragun">Hayama-cho,Miuragun</option>
                                <option value="Nagoya-city">Nagoya-city</option> 
                                <option value="Kyoto-city">Kyoto-city</option>
                                <option value="Osaka-city">Osaka-city</option>    
                                <option value="Sakai-city">Sakai-city</option>    
                                <option value="Kishiwada-city">Kishiwada-city</option>    
                                <option value="Toyanaka-city">Toyanaka-city</option>    
                                <option value="Ikeda-city">Ikeda-city</option>    
                                <option value="Izuma Otsu-city">Izuma Otsu-city</option>    
                                <option value="Takatsuki-city">Takatsuki-city</option>  
                                <option value="Kaizuka-city">Kaizuka-city</option>  
                                <option value="Moriguchi-city">Moriguchi-city</option>  
                                <option value="Hirakata-city">Hirakata-city</option>  
                                <option value="Ibaraki-city">Ibaraki-city</option>  
                                <option value="Yoa-city">Yoa-city</option>  
                                <option value="Izumisano-city">Izumisano-city</option>  
                                <option value="Tondabayashi-city">Tondabayashi-city</option>  
                                <option value="Niyagawa-city">Niyagawa-city</option>   
                                <option value="Izumic-city">Izumic-city</option> 
                                <option value="Minoo-city">Minoo-city</option>  
                                <option value="Takishi-city">Takishi-city</option>  
                                <option value="Higashi Osaka-city">Higashi Osaka-city</option>
                                <option value="Tadaoka-city, Izumi Kitagun">Tadaoka-city, Izumi Kitagun</option>  
                                <option value="Lain-lain">Lain-lain</option>  
                              </select>
                          </div>
                          <div class="form-group">
                              <select name="tmpt_study2" class="form-group form-control-user" id="place_canada" placeholder="Pilih la yang mana satu" onchange="">
                                <option value="Lain-lain">Sila Pilih</option>
                                <option value="Toronto">Toronto</option>
                                <option value="Ottawa">Ottawa</option>
                                <option value="Calgary">Calgary</option>
                                <option value="Montreal">Montreal</option>
                                <option value="Vancouver">Vancouver</option>
                                <option value="Lain-lain">Lain-lain</option>                                        
                              </select>
                          </div>
                          <div class="form-group">
                              <select name="tmpt_study2" class="form-group form-control-user" id="place_newzealand" placeholder="Pilih la yang mana satu" onchange="">
                                <option value="Lain-lain">Sila Pilih</option>
                                <option value="Wellington">Wellington</option>
                                <option value="Auckland">Auckland</option>
                                <option value="Lain-lain">Lain-lain</option>                                        
                              </select>
                          </div>
                          <div class="form-group">
                            <input name="tmpt_study2" type="text" class="form-control form-control-user" id="place" placeholder="Nama Tempat">
                          </div>
                        </div>
                    </div>
              
     
                      

              <div class="table-responsive">
              <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead>
                  <tr>

                    <th>Nama</th>
                    <th>Hubungan</th> 
                    <th>No Kad Pengenalan</th>                     
                    <th>Umur</th>
                    <th><a href="#"><i class="btn btn-success mt-4">+</i></a></th><!-- onclick="addRow()" -->

                  </tr>
                </thead>
                <tfoot>
                  <tr>
             

                  </tr>
                </tfoot>
                <tbody>
                <tr>
                      <td> <input name="tanggung_nama" type="text" class="form-control " id="Input_course"></td>
                      <td> <input name="tanggung_hubungan" type="text" class="form-control " id="Input_course"></td>
                      <td> <input name="tanggung_nokp" type="text" class="form-control " id="Input_course"></td>
                      <td> <input name="tanggung_umur" type="text" class="form-control " id="Input_course"></td>
                      <td> </td>
                  </tr>  
            
                  </tbody>

                
              </table>
              </div>
              
            </div>
          </div>
          <script type="text/javascript">
              function addRow()
              {

                  var tr='<tr>'+
                  '<td><input name="tanggung_nama_[i]" type="text" class="form-control" require=""></td>'+
                  '<td><input name="tanggung_hubungan" type="text" class="form-control" require=""></td>'+
                  '<td><input name="tanggung_nokp" type="text" class="form-control" require=""></td>'+
                  '<td><input name="tanggung_umur" type="text" class="form-control" require=""></td>'+
                  '<td></td>'+
                  '</tr>';

                  $('table').append(tr);

              };
          </script>
              


                      <div class="row">
                      <!-- tanggungan 
                      <div id="Tanggungan" class="card shadow mb-4 col-xl-12">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">anak</h6>
                        </div>
                        <div class="card-body">
                          <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
                          </div>
                          <p>
                            <input class="form-control form-group form-control-user" type="" name="">
                            <input class="form-control form-group form-control-user" type="" name="">
                          </p>
                        </div>
                      </div>-->
                      </div>

                      <!--<div class="row">
                        <input id="statustw" type="checkbox" onclick="togglediv('uploadstatw')" name="is_ok[]">
                            <label class="form-control-label" style="margin:3px 9px 0px 6px" for="input-tawaran">
                                  Surat tawaran daripada Universiti
                            </label>
                      </div>-->

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
                      <button id="apply_btn" type="submit" class="btn btn-primary mt-4">Mohon</button>
                  </div>

               @csrf
              </form>
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

<script type="text/javascript">
  var gred = '{{ $user_data -> Gred }}';
  var age = '{{ $user_data -> umur }}';
  var service = '{{ $user_data -> tberkhidmat }}';
  var appoint = '{{ $user_data -> TarafLantik }}';
  var average = '{{ $avg }}' / 3;

  var tanggungan = '{{ $user_data -> tarafkahwin }}';
  //alert(tanggungan);

  if(tanggungan == 'Berkahwin'){
    document.getElementById("Tanggungan").style.display = 'block';
  }

  function denied() {
      alert("Anda tidak layak untuk memohon");
      document.getElementById("apply_btn").disabled = true;
  }

  function granted() {
    document.getElementById("apply_btn").disabled = false;
  }

  function study_m0de() {
    document.getElementById("stdy").disabled = false;
    var y = document.getElementById("stdy").value; 

    if(y == "Full Time") {
      document.getElementById("option_u_form").style.display = "none";
      document.getElementById("option_u_form").disabled = true;
      document.getElementById("nama_u_form").style.display = "block";
    }
    else {
      document.getElementById("nama_u_form").style.display = "none"; 
      document.getElementById("nama_u_form").disabled = true;
      document.getElementById("option_u_form").style.display = "block";
    }
  }

  function cek_luarnegara() {
    document.getElementById("place_amerika").disabled = false;
    document.getElementById("place_india").disabled = false;
    document.getElementById("place_japan").disabled = false;
    document.getElementById("place_indon").disabled = false;
    document.getElementById("place_newzealand").disabled = false;
    document.getElementById("place_australia").disabled = false;
    document.getElementById("place_canada").disabled = false;
  
    var y = document.getElementById("place_stdy").value; 


    if(y == "Luar Negara") {

      document.getElementById("place_study").disabled = false; 
      document.getElementById("place_amerika").disabled = true; 
      document.getElementById("place_india").style.display = "none";
      document.getElementById("place_japan").style.display = "none";
      document.getElementById("place_indon").style.display = "none";
      document.getElementById("place_newzealand").style.display = "none";
      document.getElementById("place_australia").style.display = "none";
      document.getElementById("place_canada").style.display = "none";
      document.getElementById("place").style.display = "none"; 
  
    }
    else {
      document.getElementById("place_study").disabled = true; 
      document.getElementById("place_amerika").disabled = true; 
      document.getElementById("place_india").style.display = "none";
      document.getElementById("place_japan").style.display = "none";
      document.getElementById("place_indon").style.display = "none";
      document.getElementById("place_newzealand").style.display = "none";
      document.getElementById("place_australia").style.display = "none";
      document.getElementById("place_canada").style.display = "none";
      document.getElementById("place").style.display = "none"; 


    }
  }

  function cek_namanegara() {
  
  var z = document.getElementById("place_study").value; 


  if(z == "Amerika Syarikat") {

    document.getElementById("place_amerika").disabled = false; 
    document.getElementById("place_amerika").style.display = "block"; 
    document.getElementById("place_indon").style.display = "none"; 
    document.getElementById("place_canada").style.display = "none"; 
    document.getElementById("place_japan").style.display = "none"; 
    document.getElementById("place_india").style.display = "none"; 
    document.getElementById("place_newzealand").style.display = "none"; 
    document.getElementById("place_australia").style.display = "none"; 
    document.getElementById("place").style.display = "none"; 

  }
  else if(z == "Australia") {
 
    document.getElementById("place_australia").disabled = false; 
    document.getElementById("place_australia").style.display = "block"; 
    document.getElementById("place_indon").style.display = "none"; 
    document.getElementById("place_canada").style.display = "none"; 
    document.getElementById("place_japan").style.display = "none"; 
    document.getElementById("place_india").style.display = "none"; 
    document.getElementById("place_newzealand").style.display = "none"; 
    document.getElementById("place_amerika").style.display = "none"; 
    document.getElementById("place").style.display = "none"; 

  }
  else if(z == "India") {
 
   document.getElementById("place_india").disabled = false; 
   document.getElementById("place_india").style.display = "block"; 
   document.getElementById("place_indon").style.display = "none"; 
   document.getElementById("place_canada").style.display = "none"; 
   document.getElementById("place_japan").style.display = "none"; 
   document.getElementById("place_australia").style.display = "none"; 
   document.getElementById("place_newzealand").style.display = "none"; 
   document.getElementById("place_amerika").style.display = "none"; 
   document.getElementById("place").style.display = "none"; 

}
else if(z == "Indonesia") {
 
 document.getElementById("place_indon").disabled = false; 
 document.getElementById("place_indon").style.display = "block"; 
 document.getElementById("place_india").style.display = "none"; 
 document.getElementById("place_canada").style.display = "none"; 
 document.getElementById("place_japan").style.display = "none"; 
 document.getElementById("place_australia").style.display = "none"; 
 document.getElementById("place_newzealand").style.display = "none"; 
 document.getElementById("place_amerika").style.display = "none"; 
 document.getElementById("place").style.display = "none"; 

}
else if(z == "Jepun") {
 
 document.getElementById("place_japan").disabled = false; 
 document.getElementById("place_japan").style.display = "block"; 
 document.getElementById("place_india").style.display = "none"; 
 document.getElementById("place_canada").style.display = "none"; 
 document.getElementById("place_indon").style.display = "none"; 
 document.getElementById("place_australia").style.display = "none"; 
 document.getElementById("place_newzealand").style.display = "none"; 
 document.getElementById("place_amerika").style.display = "none"; 
 document.getElementById("place").style.display = "none"; 

}
else if(z == "Kanada") {
 
 document.getElementById("place_canada").disabled = false; 
 document.getElementById("place_canada").style.display = "block"; 
 document.getElementById("place_india").style.display = "none"; 
 document.getElementById("place_japan").style.display = "none"; 
 document.getElementById("place_indon").style.display = "none"; 
 document.getElementById("place_australia").style.display = "none"; 
 document.getElementById("place_newzealand").style.display = "none"; 
 document.getElementById("place_amerika").style.display = "none"; 
 document.getElementById("place").style.display = "none"; 

}
else if(z == "New Zealand") {
 
 document.getElementById("place_newzealand").disabled = false; 
 document.getElementById("place_newzealand").style.display = "block"; 
 document.getElementById("place_india").style.display = "none"; 
 document.getElementById("place_japan").style.display = "none"; 
 document.getElementById("place_indon").style.display = "none"; 
 document.getElementById("place_australia").style.display = "none"; 
 document.getElementById("place_canada").style.display = "none"; 
 document.getElementById("place_amerika").style.display = "none"; 
 document.getElementById("place").style.display = "none"; 

}

else{

  document.getElementById("place").disabled = false;
  document.getElementById("place").style.display = "block"; 
  document.getElementById("place_newzealand").style.display = "none"; 
  document.getElementById("place_india").style.display = "none"; 
  document.getElementById("place_japan").style.display = "none"; 
  document.getElementById("place_indon").style.display = "none"; 
  document.getElementById("place_australia").style.display = "none"; 
  document.getElementById("place_canada").style.display = "none"; 
  document.getElementById("place_amerika").style.display = "none"; 
}
}



  function check_perlantikan() {
    if(appoint == "Kontrak") {
      document.getElementById("nama_u_form").style.display = "none";
      document.getElementById("option_u_form").style.display = "block";
      document.getElementById("stdy").value = "Part Time"; 
      document.getElementById("place_stdy").value = "Dalam Negeri Sabah";
      //document.getElementById("stdy").disabled = true;
      //document.getElementById("place_stdy").disabled = true;
      document.getElementById("mstr_sel").disabled = true;
      document.getElementById("phd_sel").disabled = true;
      document.getElementById("loc_c").disabled = true;
      document.getElementById("os").disabled = true;
      document.getElementById("ftime").disabled = true;
    }
    else if(appoint == "Tetap" || appoint == "Sementara" || appoint == "Percubaan") {
      study_m0de();
    }
  }
  
  function course_validation() {
    if (average >= 85) {
      initial_validation();
    }
    else {
      denied();
    }
  }

  function initial_validation() {
    var x = document.getElementById("course").value;

    if (service >= 2) {
      if(x == '0') {
        alert("please select kursus pengajian");
      }

      else if(x == 'Sarjana Muda') { //reverse initial condition: where else tu yg check validation yang lain
        if (age <= 35  && gred <= 36) {
          check_perlantikan();
          granted(); 
        }
        else {
          denied();         
        }
      }
        
      else if(x == 'Sarjana'){
        if(age <= 45 && gred <= 41){
          check_perlantikan();
          granted(); 
        }
        else { 
          denied();         
        }
      }

      else if(x == 'Doktor Falsafah'){
        if(age <= 45 && gred <= 41){
          check_perlantikan();
          granted();
        }
        else {
          denied();
        }
      }
    }

    //ini kalau tahun berkhidmat dia under < 2
    else {
      denied();
    }    
  }
</script>
