@extends('layout.User.main_User')
@section('content')   

        <div class="card-body">          

             <div class="col-xl-12 order-xl-2 p-5 bg-white rounded shadow mb-5">

                <!-- Breadcrumbs -->
                <div class="row">
                    <!--    muchos disgustimos   -->
                    <div class="breadcrumb-paginationx"> 
                      <div class="completedx" id="">
                        <span></span>
                        <p>borang 1</p>   
                      </div>
                      <div class="activex" id="">
                        <span></span>
                        <p>borang 2</p>
                      </div>
                      <div class="todox" id="">
                        <span>3</span>
                        <p>borang 3</p>
                      </div>
                      <div class="todox" id="">
                        <span>4</span>
                        <p>borang 4</p>
                      </div>
                    </div>
                </div>

                <!-- Bordered tabs-->
                <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="b_pegawai-tab" data-toggle="tab" href="#b_pegawai" role="tab" aria-controls="b_pegawai" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Pegawai</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="b_pengajian-tab" data-toggle="tab" href="#b_pengajian" role="tab" aria-controls="b_pengajian" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Pengajian</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="b_tangg-tab" data-toggle="tab" href="#b_tangg" role="tab" aria-controls="b_tangg" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Tanggungan</a>
                  </li>
                </ul>

                <div id="myTab1Content" class="tab-content">
                  <div id="b_pegawai" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                      @include('User.pegawai_info')
                  </div>

                  <div id="b_pengajian" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                      @include('User.pengajian_info')
                  </div>

                  <div id="b_tangg" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                      @include('User.tanggungan_info')
                  </div>
                </div>
          </div>
        </div>
@endsection   
<script type="text/javascript">
  //add script to fetch existing id on borang; populate breadcrumbs by appending class to specific id 
  //should pass vue  variable from backend
  //re-declare using javascript
</script>           