@extends('Admin.layout.main_Admin')
<script type="text/javascript">
var jumlah = '{{ $budget }}';
var bayaran = '{{ $paid }}';
var baki = '{{ $balance }}';

//alert([jumlah, total]); //[jumlah, total, tuntutan]

</script>
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


    <div class="container-fluid mt--7">

      <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <center> <div class="h5 mb-0 font-weight-bold text-gray-800"> <h4>Maklumat Pegawai</h4></div></center>
                        <center> <div class="card-profile-image">
                                 <a href="">
                                 <img src="storage/profilePic/{{ $user_profile -> avatar }}" class="rounded-circle">
                                 </a>
                                 </div></center>
                         <p class="leade font-italic"><b>Nama:</b> {{ $user_profile -> name }}</p>
                         <p class="leade font-italic"><b>No kad Pengenalan:</b> {{ $user_profile->nokp }}</p>
                         <p class="leade font-italic"><b>Umur:</b> {{ $user_profile->umur }}</p>
                         <p class="leade font-italic"><b>Taraf perkahwinan:</b> {{ $user_profile->tarafkahwin }}</p>
                         <p class="leade font-italic"><b>Jumlah Tangunggan:</b> </p>
                         <p class="leade font-italic"><b>Jabatan:</b> {{ $user_profile->jabatan }}</p>
                         <p class="leade font-italic"><b>Jawatan:</b> {{ $user_profile->jawatan }}</p>
                         <p class="leade font-italic"><b>Gred Jawatan:</b> {{ $user_profile->skim }}{{ $user_profile->Gred }}</p>
                         <p class="leade font-italic"><b>Taraf Pelantikan:</b> {{ $user_profile->TarafLantik }}</p>
                         <p class="leade font-italic"><b>Tempoh Perkhidmatan:</b> {{ $user_profile->tberkhidmat }}</p>
                         <p class="leade font-italic"><b>Kelulusan Akademik Tertinggi:</b> {{ $user_profile->AkademikInfo }}</p>
                        <br>
                    </div>
                  </div>
                </div>
             </div>
         </div>

         <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <center> <div class="h5 mb-0 font-weight-bold text-gray-800"> <h4>Maklumat Pengajian</h4</div></center>
                        <br>
                        <p class="leade font-italic"><b>Mod Pengajian:</b> {{ $user_profile->mod_pengajian }}</p>
                        <p class="leade font-italic"><b>Nama Univesiti:</b> {{ $user_profile->Uni_name }}</p>
                        <p class="leade font-italic"><b>Nama Kursus Pengajian:</b> {{ $user_profile->course }}</p>
                        <p class="leade font-italic"><b>Tempat Pengajian:</b> {{ $user_profile->tmpt_study }}</p>
                        <p class="leade font-italic"><b>Tarikh Mula Pengajian:</b> {{ $user_profile->startStudy }}</p>
                        <p class="leade font-italic"><b>Tarikh Tamat Pengajian:</b> {{ $user_profile->EndStudy }}</p>
                        <p class="leade font-italic"><b>Tempoh Pengajian:</b> </p>
                        <p class="leade font-italic"><b>Anggaran Kos Pengajian:</b> </p>
                        <p class="leade font-italic">
                        <b>Surat Tawaran Universiti</b>: <a href="storage/{{ $user_profile->tawaran }}">File</a>
                        </p>
                        <br>
                    </div>
                  </div>
                </div>
             </div>
         </div>
      </div><!--end row-->

      <div class="text-right ol-sm-12 col-md-12">
                      <button id="apply_btn" type="submit" class="btn btn-success mt-4">Lulus</button>
                      <button id="apply_btn" type="submit" class="btn btn-danger mt-4">Gagal</button>
                      <button id="apply_btn" type="submit" class="btn btn-primary mt-4">Lulus Bersyarat</button>
                  </div>
    </div>
  </div>

  </div>        
</div>
          </div>

                  </div>
@endsection


