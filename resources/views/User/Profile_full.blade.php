@extends('layout.User.main_User')
<script type="text/javascript">
var jumlah = '{{ $jumlah }}';
var total = '{{ $total }}';
var tuntut = '{{ $tuntut }}';

//alert([jumlah, total]); //[jumlah, total, tuntutan]

</script>
@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-4  mb-5 mb-xl-0">
                <div class="card card-profile">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-xl-9 col-lg-4 order-lg-4">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="storage/profilePic/{{ auth()->user()-> avatar }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                            </div>
                        </div>
                        <div class="text-center" id="profile_permohonan">
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">Nama: </i>
                                {{ auth()->user()->name }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">No. Kad Pengenalan:</i>
                                {{ $user_profile -> nokp }}
                            </div>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2">Email: </i>{{ auth()->user()->email }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">No. Tel (peribadi): </i>
                                {{ $user_profile -> telno }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">No. Tel (pejabat): </i>
                                {{ $user_profile -> telnoPej }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

             <div class="col-xl-8 order-xl-2 mb-5">
                <!-- Bordered tabs-->
                <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Pegawai</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Pengajian</a>
                  </li>
                </ul>

                <div id="myTab1Content" class="tab-content">
                  <div id="home1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                    <p class="leade font-italic">Nama: {{ auth()->user()->name }}</p>
                    <p class="leade font-italic">No kad Pengenalan: {{ $user_profile->nokp }}</p>
                    <p class="leade font-italic">Email: {{ $user_profile->email }}</p>
                    <p class="leade font-italic">Alamat: {{ $user_profile->alamat }}</p>
                    <p class="leade font-italic">Status Peribadi: {{ $user_profile->tarafkahwin }}</p>
                    <p class="leade font-italic">Jabatan: {{ $user_profile->jabatan }}</p>
                    <p class="leade font-italic">Jawatan: {{ $user_profile->jawatan }}</p>
                    <p class="leade font-italic">Gred: {{ $user_profile->skim }}{{ $user_profile->Gred }}</p>
                    <p class="leade font-italic">Taraf Pelantikan: {{ $user_profile->TarafLantik }}</p>

                    <a href="/editmaklumat/{{ $user_profile->nokp}}" class="btn btn-success d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Edit Maklumat</a>
                  </div>

                  <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                    <p class="leade font-italic">Kursus Dipohon: {{ $user_profile->AppliedKursus }}</p>
                    <p class="leade font-italic">Pengajian: {{ $user_profile->AkademikInfo }}</p>
                    <p class="leade font-italic">Tarikh Mula Pengajian: {{ $user_profile->startStudy }}</p>
                    <p class="leade font-italic">Tarikh Tamat Pengajian: {{ $user_profile->EndStudy }}</p>
                    <p class="leade font-italic">Nama Universiti: {{ $user_profile->Uni_name }}</p>
                    <p class="leade font-italic">Mod Pengajian: {{ $user_profile->mod_pengajian }}</p>
                    <p class="leade font-italic">Lokasi Pengajian: {{ $user_profile->tmpt_study }}</p>
                    <p class="leade font-italic">
                        Surat Tawaran Universiti: <a href="storage/{{ $user_profile->tawaran }}">File</a>
                    </p>
                    <p class="leade font-italic">
                        Surat Akuan Ketua Jabatan: <a href="storage/{{ $user_profile->surakuan }}">File</a>
                    </p>
                  </div>
          </div>
          </div>
          </div> <!-- row end -->


          <div class="col-xl-12 card">
            <!--<div id="contact1" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">-->
                  <div class="card-body">
         
          
                <div class="card-header">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                  <h6 class="m-0 font-weight-bold text-primary" >Status Pembiayaan Biasiswa</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" onclick="myChartTTTT()">PNG</a>
                      <a class="dropdown-item" href="#">JPG</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="PieChart_user"></canvas>
                    <script type="text/javascript">

                      function myChartTTTT(){
                       const canvas = document.getElementById('PieChart_user');
                       console.log(canvas);
                       image = canvas.toDataURL("image/png");
                       var link = document.createElement('a');
                       link.download = "Status-Pembiayaan-Pelajar.png";
                       link.href = image;
                       link.click();
                      };
                    </script>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Jumlah Pembiayaan Sekarang
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Tuntutan Pembiayaan Belum Dibayar
                    </span>
                  </div>
                 
                </div>

              </div>
            </div>
          </div>
      
          
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

                    <th>Tarikh</th>
                    <th>Jenis</th> 
                    <th>Tempoh</th>                     
                    <th>Jumlah(RM)</th>

                  </tr>
                </thead>
                <tfoot>
                  <tr>

                    <th>Tarikh</th>
                    <th>Jenis</th> 
                    <th>Tempoh</th>                     
                    <th>Jumlah(RM)</th>

                  </tr>
                </tfoot>
                <tbody>
                    @foreach($tuntut as $key => $data)
                    <tr>
                      <td>{{ $data -> date_penyerahan }}</td>
                      <td>{{ $data -> perkara }}</td>
                      <td>{{ $data -> tempoh }}</td>
                      <td>{{ $data -> tuntutan }}</td>
                    </tr>     
                    @endforeach                

                  </tbody>

                
              </table>
              </div>
              
            <!--</div>-->
            <!-- ends here  -->
          </div>

                  </div>
@endsection


