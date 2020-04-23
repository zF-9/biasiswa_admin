@extends('Admin.layout.main_Admin')
<script type="text/javascript">
  
</script>
@section('content') 
        <div class="card-body">          

             <div class="col-xl-12 order-xl-2 p-5 bg-white rounded shadow mb-5">

                <!-- Breadcrumbs -->
                <div class="row">

                <!-- Bordered tabs-->
                <ul id="myTab1" role="tablist" class="col-lg-12 nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="b_pegawai-tab" data-toggle="tab" href="#b_pegawai" role="tab" aria-controls="b_pegawai" aria-selected="true" class="nav-link text-uppercase font-weight-bold rounded-0 border active">Luar Negara</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="b_pengajian-tab" data-toggle="tab" href="#b_pengajian" role="tab" aria-controls="b_pengajian" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Dalam Negara</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="b_tangg-tab" data-toggle="tab" href="#b_tangg" role="tab" aria-controls="b_tangg" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Sepenuh Masa</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="lastTab-tab" data-toggle="tab" href="#lastTab" role="tab" aria-controls="lastTab" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Separuh Masa</a>
                  </li>
                </ul>
              </div>

                <div id="myTab1Content" class="tab-content">
                  <div id="b_pegawai" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                      @include('Admin.layout.LuarNegara')
                  </div>

                  <div id="b_pengajian" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                       @include('Admin.layout.dalamNegara')
                  </div>

                  <div id="b_tangg" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                       @include('Admin.layout.fullTime')
                  </div>
                  <div id="lastTab" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                       @include('Admin.layout.partTime')
                  </div>
                </div>
          </div>
        </div>

@endsection   
<script type="text/javascript">
  //add additional script if required
</script>           