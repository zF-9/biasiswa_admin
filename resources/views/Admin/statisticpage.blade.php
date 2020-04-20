@extends('layout.Admin.main_Admin')
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
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pelajar Mengikut Mod Pengajian</h6>
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



          <div class="row">
              <div class="table-responsive">
              <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead>
                  <tr>

                    <th>Nama</th>
                    <th>Agensi/Jabatan</th> 
                    <th>Univeristy</th>                     
                    <th>Negara</th>
                    <th><a href="#" onclick="Count_AddRows()"><i class="btn btn-success mt-4">+</i></a></th><!--  -->

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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
@endsection


