@extends('User.layout.main_User')
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
            <h1 class="h3 mb-0 text-gray-800">Laman Utama</h1>
           <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>
               
          @if($errors->any())
          <div class="col-lg-6 mb-4">
            <div class="card bg-danger text-white shadow">
              <div class="card-body">
                Perhatian
                <div class="text-white-50 small">{{$errors->first()}}</div>
               </div>
              </div>
          </div>    
          @endif

          <!-- Content Row -->
          <div class="row">           

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengumuman Penting</div>
                      <div> <a class="h5 mb-0 font-weight-bold text-gray-800" href="storage/iklan/iklan.png">Menyampaikan surat Tawaran Biasiswa Kerajaan Negeri Sabah selepas Mesyuarat Jawatankuasa Biasiswa Kerajaan Negeri Sabah</a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Perhatian</div>
                      <div><a class="h5 mb-0 font-weight-bold text-gray-800" href="storage/iklan/syarat.png">Syarat-syarat Permohonan Biasiswa</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perhatian</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Syarat-syarat Perjanjian Biasiswa</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Perhatian</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Syarat-syarat Biasiswa Pegawai Kerajaan Negeri</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <!-- Content Row -->

          <div class="row">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Bahagian Biasiswa dan Latihan</h6>
                </div>
                <div class="card-body">
                  <p>Bahagian Biasiswa Dan Latihan Dalam Perkhidmatan merupakan bahagian yang bertanggungjawab untuk merancang dan mengurus pemberian biasiswa kepada pegawai-pegawai awam dan pembangunan eksekutif di Perkhidmatan Awam Negeri.</p>
                  <p class="mb-0">
                    Perkhidmatan Biasiswa Untuk Pegawai Kerajaan
                    Menawarkan Biasiswa kepada Pegawai Kerajaan yang layak dalam program pendidikan akademik sama ada di dalam atau di luar Negara.
                  </p>
                  <hr>
                  <p class="mb-0">
                    Latihan Dalam Perkhidmatan di Jabatan Perkhidmatan Awam Negeri Sabah
                    Merancang dan menawarkan program Latihan Dalam Perkhidmatan berteraskan pembangunan dan pembelajaran berterusan bagi melengkapkan penjawat awam dengan pengetahuan, kemahiran dan ciri-ciri peribadi yang diperlukan untuk melaksanakan tugas dan tanggungjawab sesuatu jawatan.
                  </p>
                </div>
              </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

            </div>

            <div class="col-lg-6 mb-4">
              
            </div>
            <!-- illustrations card -->

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


