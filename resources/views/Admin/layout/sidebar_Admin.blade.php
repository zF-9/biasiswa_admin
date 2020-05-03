    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <!--<i class="fas fa-laugh-wink"></i>-->
        </div>
        <!--<div class="sidebar-brand-text mx-3">E-Biasiswa <sup>2</sup></div>-->
         <img src="{{url('storage/img/pic.png')}}" alt="Trulli" width="80" height="50"> <!-- "storage/img/pic.png" -->
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-home"></i>
          <span>Halaman</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-database"></i>
          <span>Jadual Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jenis Data:</h6>
            <a class="collapse-item" href="/datatable_pemohon">Permohonan</a>
            <a class="collapse-item" href="/datatable_pelajar">Pelajar</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/boards">
        <i class="fas fa-fw fa-archive"></i>
          <span>Senarai Pemohonan</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <!--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>-->
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tambahan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item">
        <a class="nav-link" href="/datatable_tuntutan">
        <i class="fas fa-fw fa-credit-card"></i>
          <span>Rekod Tuntuan Pembayaran</span></a>
      </li>

      <!-- Nav Item - Charts 
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Carta Analisis</span></a>
      </li>-->

      <!-- Nav Item - Tables 
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>-->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-filter"></i>
          <span>Toggle filter</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jenis Data:</h6>
            <a class="collapse-item" href="">Filter Pegawai</a>
            <a class="collapse-item" href="">Filter Pengajian</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item">
        <a class="nav-link" href="/Settings">
        <i class="fas fa-fw fa-cog"></i>
          <span>Settings</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
      <!-- modal upload pic -->
  <div id="avatarModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Kemas Kini Gambar Profil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="storage/profilePic/{{ auth()->user()-> avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <h2>{{ auth()->user()->name }}</h2>
                        <form enctype="multipart/form-data" action="/updateAvatar" method="POST">
                            <label>Muat Naik Gambar Profil</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <!--<input style="margin-top:12px; margin-bottom: 12px" type="submit" class="pull-right btn btn-sm btn-primary">-->
                            <button type="button submit" style="margin-top:12px; margin-bottom: 12px" class="btn btn-primary">Muat Naik</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>  
      </div>
      </div>
    </div>  
</div>
    <!-- modal upload pic -->