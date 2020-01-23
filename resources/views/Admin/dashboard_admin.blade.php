@extends('layout.Admin.main_Admin')
<script type="text/javascript">
  var data_pemohon = '{{ $data_pemohon }}';
  var data_student = '{{ $data_student }}';
  var data_applicant = '{{ $data_applicant}}';
  var fulltime = '{{ $FT_student }}';
  var parttime = '{{ $PT_student }}';

  var gred_36 = '{{ $c36 }}';
  var gred_41 = '{{ $c41 }}';
  var gred_48 = '{{ $c48 }}';

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

  var jabatan = '{{!! json_encode($rank) !!}}'; 
  //var new_rank = jabatan[0];


  //alert(new_rank);

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

          <div class="row">
          

            <!-- Area Chart -->
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

                        console.log(canvas);
                        //var canvas = document.getElementById("mcanvas");
                        image = canvas.toDataURL("image/png");
                        var link = document.createElement('a');
                         link.download = "jumlahpembiayaan.png";
                         link.href = image;
                         link.click();
                     // console.log(dataURI);                        

                      };

                  </script>
                <div id="chartContainer" style="height: 275px; width: 100%;"></div>
                  </div>
                </div>
              </div>
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

          <!-- Content Row -->
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


            <!-- Earnings (Monthly) Card Example -->
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
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Bilangan Pelajar Sarjana
                      </div>
                      @foreach($masterapp as $key => $data)
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
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Bilangan Pelajar Doktor Falsafah
                      </div>
                      @foreach($phdapp  as $key => $data)
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

            <!-- Earnings (Monthly) Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            </div>

            <div class="row">

                      <!-- Illustrations -->
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                        </div>
                        <div class="card-body">
                          <div class="text-center">
                            <!--<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">-->
<!--<canvas id="PieChart-gredbyDegree" width="200" height="200"></canvas>
<canvas id="PieChart-gredbyMaster" width="200" height="200"></canvas>
<canvas id="PieChart-gredbyPHD" width="200" height="200"></canvas>-->


                          </div>
                          <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                        </div>
                      </div>

            <!-- Pending Requests Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>-->
        </div>

        <div class="row">

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sarjana Muda</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="PieChart-gredbyDegree"></canvas>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Terima
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Diproses
                    </span>
                    <!--<span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>-->
                  </div>
                 
                </div>

              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sarjana</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="PieChart-gredbyMaster"></canvas>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Terima
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Diproses
                    </span>
                    <!--<span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>-->
                  </div>
                 
                </div>

              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Doktor Falsafah</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="PieChart-gredbyPHD"></canvas>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Terima
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Diproses
                    </span>
                    <!--<span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>-->
                  </div>
                 
                </div>

              </div>
            </div>

        </div>

          <!-- Content Row -->

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-4 mb-4">
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pemohon: mod pengajian</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="BarChart-mod"></canvas>
                  </div>
                  <hr>
                </div>
              </div>
            </div>


            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pemohon Mengikut Agensi</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Jabatan Pengairan dan Saliran<span class="float-right">50</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Unit Perancang Ekonomi Negeri<span class="float-right">60</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Jabatan Air Negeri Sabah<span class="float-right">60</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Jabatan Tanah & Ukur<span class="float-right">80</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Jabatan Kerja Raya<span class="float-right">100</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <hr>
                  <!--change variable di <code>inline css</code> ja append value dari database directly.    -->              
                </div>
              </div>
            </div> <!-- row end -->
          </div>


            <div class="row">
              <!-- Project Card Example -->
            <div class="col-lg-8 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pemohon Mengikut Gred</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">36 Below<span class="float-right">50</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">36<span class="float-right">60</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">41<span class="float-right">60</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: {{ $c41 }}%" aria-valuenow="{{ $c41 }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">44<span class="float-right">80</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">48<span class="float-right">100</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <hr>
                  <!--change variable di <code>inline css</code> ja append value dari database directly.    -->              
                </div>
              </div>
            </div>


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
                    <!--<span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>-->
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
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pemohon: Kursus</h6>
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
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pemohon: Bulanan</h6>
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
@endsection


