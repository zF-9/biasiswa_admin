@extends('layout.User.main_User')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Rekod Pembayaran</h1>
          <p class="mb-4"></p>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Maklumat Pembiayaan</h6>
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
                    <canvas id="myPieChart"></canvas>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Ditaja
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Diproses
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Dibayar
                    </span>
                  </div>

                </div>
              </div>
            </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">History</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <!--<th>Id</th>-->
                      <th>Tarikh Pembayaran</th>
                      <th>Nombor Baucer</th> 
                      <th>Jumlah</th>
                      <th>Jenis Pembayaran</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <!--<th>Id</th>-->
                      <th>Tarikh Pembayaran</th>
                      <th>Nombor Baucer</th> 
                      <th>Jumlah</th>
                      <th>Jenis Pembayaran</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($payment as $key => $data)
                    <tr>
                      <td>{{ $data -> date_pymnt }}</td>
                      <td>{{ $data -> No_baucer }}</td>
                      <td>{{ $data -> Amount }}</td>
                      <td>{{ $data -> jenis_pymnt }}</td>
                    </tr>    
                    @endforeach                
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection