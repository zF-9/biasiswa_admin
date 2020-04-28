@extends('Admin.layout.main_Admin')
<script type="text/javascript">
  
</script>
@section('content') 
        <div class="card-body">          

             <div class="col-xl-12 order-xl-2 p-5 bg-white rounded shadow mb-5">

                <!-- Breadcrumbs -->
                <div class="row">

                <!-- Bordered tabs-->
                <ul id="local_abroad" role="tablist" class="col-lg-12 nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="abroad-tab" data-toggle="tab" href="#abroad" role="tab" aria-controls="abroad" aria-selected="true" class="nav-link text-uppercase font-weight-bold rounded-0 border active">Luar Negara</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="local-tab" data-toggle="tab" href="#local" role="tab" aria-controls="local" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Dalam Negara</a>
                  </li>
                </ul>
              </div>

                <div id="local_abroadContent" class="tab-content">
                  <div id="abroad" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                      

             <div class="col-xl-12 order-xl-2 p-5 bg-white rounded shadow mb-5">

                <!-- Breadcrumbs -->
                <div class="row">

                <!-- Bordered tabs-->
                <ul id="ft_pt" role="tablist" class="col-lg-12 nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="pt-tab_oversea" data-toggle="tab" href="#pt_oversea" role="tab" aria-controls="pt" aria-selected="true" class="nav-link text-uppercase font-weight-bold rounded-0 border active">Separuh Masa</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="local-tab_oversea" data-toggle="tab" href="#ft_oversea" role="tab" aria-controls="local" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Sepenuh Masa</a>
                  </li>
                </ul>
              </div>

                <div id="ft_ptContent" class="tab-content">
                  <div id="pt_oversea" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5 show active">
                       @include('Admin.layout.abroad_pt')
                  </div>
                  <div id="ft_oversea" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                       @include('Admin.layout.abroad_ft')
                  </div>
              </div>
          </div>

                  </div>

                  <div id="local" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                       

             <div class="col-xl-12 order-xl-2 p-5 bg-white rounded shadow mb-5">

                <!-- Breadcrumbs -->
                <div class="row">

                <!-- Bordered tabs-->
                <ul id="ft_pt" role="tablist" class="col-lg-12 nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="pt-tab_local" data-toggle="tab" href="#pt_local" role="tab" aria-controls="pt" aria-selected="true" class="nav-link text-uppercase font-weight-bold rounded-0 border active">Separuh Masa</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="local-tab_local" data-toggle="tab" href="#ft_local" role="tab" aria-controls="local" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Sepenuh Masa</a>
                  </li>
                </ul>
              </div>

                <div id="ft_ptContent" class="tab-content">
                  <div id="pt_local" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5 show active">
                       @include('Admin.layout.local_pt')
                  </div>
                  <div id="ft_local" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                       @include('Admin.layout.local_ft')
                  </div>
              </div>
          </div>

                  </div>
                </div>
          </div>

        </div>

@endsection   
<script type="text/javascript">
  //add additional script if required
</script>           