@extends('Admin.layout.main_Admin')
<script type="text/javascript">
  var data_pemohon = '{{ $data_pemohon }}';
  var data_student = '{{ $data_student }}';
  var data_applicant = '{{ $data_applicant}}';
  var fulltime_degree = '{{ $FT_degree }}';
  var parttime_degree = '{{ $PT_degree }}';
  var fulltime_mstr = '{{ $FT_mstr }}';
  var parttime_mstr = '{{ $PT_mstr }}';
  var fulltime_phd = '{{ $FT_phd }}';
  var parttime_phd = '{{ $PT_phd }}';
  var degree = '{{ $degreeapp->count() }}';
  var master = '{{ $masterapp->count() }}';
  var phd = '{{ $phdapp->count() }}';
  var Jan = '{{ $Jan }}';
  var Feb = '{{ $Feb }}';
  var Mar = '{{ $Mar }}';
  var Apr = '{{ $Apr }}';
  var May = '{{ $May }}';
  var Jun = '{{ $Jun }}';
  var Jul = '{{ $Jul }}';
  var Aug = '{{ $Aug }}';
  var Sep = '{{ $Sep }}';
  var Oct = '{{ $Oct }}';
  var Nov = '{{ $Nov }}';
  var Dis = '{{ $Dis }}';
  var state = '{{ $state }}';
  var country = '{{ $country }}';
  var oversea = '{{ $oversea }}';
  var tetap = '{{ $tetap }}';
  var percubaan = '{{ $percubaan }}';
  var sementara = '{{ $sementara }}';
  var kontrak = '{{ $kontrak }}';
  var s_41a = '{{ $s_a_41 }}';
  var s_41b = '{{ $s_b_41 }}';
  var a_41a = '{{ $a_a_41 }}';
  var a_41b = '{{ $a_b_41 }}';
</script>
@section('content')
  <!-- Page Wrapper -->
  <div id="wrapper">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Halaman Utama</h1>
            <a href="/export" class="btn btn-success d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Muat Turun Laporan</a>
          </div>
          <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Pelajar</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Pemohon</a>
                  </li>
                </ul>

          
            <!-- Area Chart -->
            <div id="myTab1Content" class="tab-content">
                  <div id="home1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">

            <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pembiayaan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                   <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Muat Turun :</div>
                      <a class="dropdown-item" onclick="myCanvas()">PNG</a>
                      <a class="dropdown-item" href="#">JPG</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                 <canvas id="myAreaChart"></canvas>
                  <script type="text/javascript">
                      function myCanvas(){
                        const canvas = document.getElementById('myAreaChart');
                       // const dataURI = canvas.toDataURL("image/png");
                        //console.log(canvas);
                        //var canvas = document.getElementById("mcanvas");
                        image = canvas.toDataURL("image/png");
                        var link = document.createElement('a');
                         link.href = image;
                         link.download = "jumlahpembiayaan.png";
                         
                         var event = new MouseEvent('click');
                         
                         //link.click();
                         link.dispatchEvent(event);
                     // console.log(dataURI);                        
                      };
                  </script>
                <div id="chartContainer" style="height: 275px; width: 100%;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="row"> <!--  SINILA START -->
            <!-- Earnings (Monthly) Card Example SNINS -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Bilangan Pelajar
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data_student }}</div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>

                  </div>

                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Bilangan Pelajar Sarjana Muda
                      </div>
                      @foreach($degreeapp as $key => $data)
                      @if ($loop->first)


                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $loop -> count }}</div>
                      @endif
                      @endforeach
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>

                  </div>

                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Bilangan Pelajar Sarjana
                      </div>
                      @foreach($masterapp as $key => $data)
                      @if ($loop->first) 


                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $loop -> count }}</div>
                      @endif
                      @endforeach
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>

                  </div>

                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Bilangan Pelajar Doktor Falsafah
                      </div>
                      @foreach($phdapp  as $key => $data)
                      @if ($loop->first) 


                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $loop -> count }}</div>
                      @endif
                      @endforeach
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>

                  </div>

                </div>
              </div>
            </div>
        </div>

            <div class="row">

            <!-- Illustrations -->
              <div class="col-lg-12 card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pelajar Mengikut Gred</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">

                  </div>
                  <div class="row">

                  <!-- Project Card Example -->
                  <div class="col-lg-4 mb-4">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pelajar Sarjana Muda</h6>
                      </div>
                      @foreach($g_deg as $key => $graded)
                      <div class="card-body">
                        <h4 class="small font-weight-bold">Gred: {{ $graded->Gred }}<span class="float-right">{{ $graded->jumlah }}</span></h4>           
                      </div>
                      @endforeach
                      <hr>
                    </div>
                  </div>

                    <!-- Project Card Example -->
                  <div class="col-lg-4 mb-4">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pelajar Sarjana</h6>
                      </div>
                      @foreach($g_mstr as $key => $graded)
                      <div class="card-body">
                        <h4 class="small font-weight-bold">Gred: {{ $graded->Gred }}<span class="float-right">{{ $graded->jumlah }}</span></h4>     
                      </div>
                      @endforeach
                      <hr>
                    </div>
                  </div>

                  <div class="col-lg-4 mb-4">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pelajar Doktor Falsafah</h6>
                      </div>
                      @foreach($g_phd as $key => $graded)
                      <div class="card-body">
                        <h4 class="small font-weight-bold">Gred: {{ $graded->Gred }}<span class="float-right">{{ $graded->jumlah }}</span></h4>             
                      </div>
                      @endforeach
                      <hr>
                    </div>
                  </div>

              </div>


              </div>
              </div>
        </div>

         <!-- Project Card Example -->
         <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <a class="h6 m-0 font-weight-bold text-primary" href="">Jumlah Pelajar Mengikut Agensi</a>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_1_pel )) 
                          {{ $agensi_1_pel }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_1_pel}}</span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_1_pel }}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_2_pel )) 
                          {{ $agensi_2_pel }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_2_pel}}</span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $no_2_pel }}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_3_pel )) 
                          {{ $agensi_3_pel }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_3_pel}}</span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: {{ $no_3_pel }}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_4_pel )) 
                          {{ $agensi_4_pel }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_4_pel}}</span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $no_4_pel }}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_5_pel )) 
                          {{ $agensi_5_pel }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_5_pel}}</span>
                  </h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $no_5_pel }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <hr>

                </div>
              </div>
              
          <div class="row full-width">
            <div class="col-xl-12 col-lg-12 full-width">
              <div class="card shadow mb-4">
                <div style="padding-top: 12px; margin: auto;" id="caleandar">
                </div>
              </div>
            </div>
          </div>



        <div class="row">
            <!-- Illustrations -->
              <div class="col-lg-12 card shadow mb-4">
                <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary" >Jumlah Pelajar Mengikut Mod Pengajian</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <div class="row">
                      <div class="col-lg-4 mb-4">
                      <!-- Bar Chart -->
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Pelajar Sarjana Muda</h6>
                        </div>
                        <div class="card-body">
                          <div class="chart-bar">
                            <canvas id="BarChart-mod-degree"></canvas>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                      <div class="col-lg-4 mb-4">
                      <!-- Bar Chart -->
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Pelajar Sarjana</h6>
                        </div>
                        <div class="card-body">
                          <div class="chart-bar">
                            <canvas id="BarChart-mod-master"></canvas>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                      <div class="col-lg-4 mb-4">
                      <!-- Bar Chart -->
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Pelajar Doktor Falsafah</h6>
                        </div>
                        <div class="card-body">
                          <div class="chart-bar">
                            <canvas id="BarChart-mod-phd"></canvas>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
        </div>


        <div class="row">
            <div class="col-xl-6 col-lg-6 mb-4">

              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pelajar: Kursus</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="KursusBarChart"></canvas>
                  </div>
                  <hr>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 mb-4">
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pelajar Dalam & Luar Negara</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="BarChart-plcestdy"></canvas>
                  </div>
                  <hr>
                </div>
              </div>  
          </div>
          </div>
        

        </div>

          <!-- Content Row -->
          <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Bilangan Permohonan
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data_pemohon }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Bilangan Pemohon Sarjana Muda
                      </div>                    
                      @foreach($degree as $key => $data)
                      @if ($loop->first) <!-- logic: when it reaches last punya iteration baru dia display -->


                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $loop -> count }}</div>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Bilangan Pemohon Sarjana
                      </div>
                      @foreach($master as $key => $data)
                      @if ($loop->first) <!-- logic: when it reaches last punya iteration baru dia display -->


                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $loop -> count }}</div>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Bilangan Pemohon Doktor Falsafah
                      </div>
                      @foreach($phd as $key => $data)
                      @if ($loop->first) <!-- logic: when it reaches last punya iteration baru dia display -->


                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $loop -> count }}</div>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>





        <!-- Content Row -->
        <div class="row">

            <!-- Illustrations -->
            <div class="col-lg-12 card shadow mb-4">

                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik Agensi/Gred</h6>
                </div>
            <div class="row">
            <!-- Content Column -->
            <div class="col-lg-4 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pemohon Mengikut Agensi</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_1 )) 
                          {{ $agensi_1 }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_1}}</span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_1 }}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_2 )) 
                          {{ $agensi_2 }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_2}}</span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $no_2 }}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_3 )) 
                          {{ $agensi_3 }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_3}}</span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: {{ $no_3 }}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_4 )) 
                          {{ $agensi_4 }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_4}}</span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $no_4 }}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      @if(!empty( $agensi_5 )) 
                          {{ $agensi_5 }}
                      @else 
                          {{ __('Data tidak lengkap') }}
                      @endif
                    <span class="float-right">{{$total_5}}</span>
                  </h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $no_5 }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <hr>

                </div>
              </div>
            </div> <!-- row end -->


            <div class="col-lg-4 mb-4">
              <!-- Pie Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pelajar</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" onclick="PieChart_student()">PNG</a>
                      <a class="dropdown-item" href="#">JPG</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="PieChart_student"></canvas>
                    <script type="text/javascript">
                      function PieChart_student(){
                        const canvas = document.getElementById('PieChart_student');
                        image = canvas.toDataURL("image/png");
                        var link = document.createElement('a');
                         link.href = image;
                         link.download = "PieChart_student.png";
                         
                         var event = new MouseEvent('click');
                         link.dispatchEvent(event);                       
                      };
                    </script>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Gred 41 Dan Keatas
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Gred 41 Kebawah
                    </span>
                  </div>
                 
                </div>

              </div>
            </div>


          </div>
            <div class="col-lg-4 mb-4">
              <!-- Pie Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pemohon</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" onclick="PieChart_applicant()">PNG</a>
                      <a class="dropdown-item" href="#">JPG</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="PieChart_applicant"></canvas>
                    <script type="text/javascript">
                      function PieChart_student(){
                        const canvas = document.getElementById('PieChart_applicant');
                        image = canvas.toDataURL("image/png");
                        var link = document.createElement('a');
                         link.href = image;
                         link.download = "PieChart_applicant.png";
                         
                         var event = new MouseEvent('click');
                         link.dispatchEvent(event);                       
                      };
                    </script>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Gred 41 dan Keatas
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Gred 41 Kebawah
                    </span>
                  </div>
                 
                </div>

              </div>
            </div>
          </div>
          

          </div>
        </div> <!-- row closed -->
        </div>


            <div class="row">

            <!-- Pie Chart -->
            <div class="col-lg-4 mb-4">
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Status Permohonan Biasiswa</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" onclick="myChartTT()">PNG</a>
                      <a class="dropdown-item" href="#">JPG</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="PieChart_TT"></canvas>
                    <script type="text/javascript">
                      function myChartTT(){
                       const canvas = document.getElementById('PieChart_TT');
                       console.log(canvas);
                       image = canvas.toDataURL("image/png");
                       var link = document.createElement('a');
                       link.download = "JumlahPemohon.png";
                       link.href = image;
                       link.click();
                      };
                    </script>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Terima
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Diproses
                    </span>
                  </div>
                 
                </div>

              </div>
            </div>


          </div>

            <div class="col-xl-8 col-lg-8 mb-4">
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Permohonan: Taraf Pelantikan</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="BarChart-tlantik"></canvas>
                  </div>
                  <hr>
                </div>
              </div>  
          </div>
        
          </div>
        </div>



          <div class="row">

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
@endsection

