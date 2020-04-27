@extends('User.layout.main_User') 
@section('content')   

        <div class="card-body">          

             <div class="col-xl-12 order-xl-2 p-5 bg-white rounded shadow mb-5">

                <!-- Breadcrumbs -->
                <div class="row">
                    <!--    muchos disgustimos   -->
                    <div class="breadcrumb-paginationx"> 
                      <div class="" id="step1">
                        <span></span>
                        <p>borang 1</p>   
                      </div>
                      <div class="" id="step2">
                        <span></span>
                        <p>borang 2</p>
                      </div>
                      <div class="" id="step3">
                        <span>3</span>
                        <p>borang 3</p>
                      </div>
                      <div class="" id="step4">
                        <span>4</span>
                        <p>borang 4</p>
                      </div>
                    </div>
                </div>

<script type="text/javascript">
  $(document).ready(function() { 
    var counter = '{{ $steps }}';

      var element_1 = document.getElementById("step1");
      var element_2 = document.getElementById("step2");
      var element_3 = document.getElementById("step3");
      var element_4 = document.getElementById("step4");

      var tab_1 = document.getElementById("b_pegawai-tab");
      var tab_2 = document.getElementById("b_pengajian-tab");
      var tab_3 = document.getElementById("b_tangg-tab");

      var borang_1 = document.getElementById("b_pegawai");  
      var borang_2 = document.getElementById("b_pengajian");
      var borang_3 = document.getElementById("b_tangg");

      if(counter == 0){
        element_1.classList.add("activex"); 
        element_2.classList.add("todox");       
        element_3.classList.add("todox");
        element_4.classList.add("todox");      

        tab_1.classList.add("active");

        borang_1.classList.add("active");    
        borang_1.classList.add("show");               
      }

      else if(counter == 1){
        element_1.classList.add("completedx"); 
        element_2.classList.add("activex");       
        element_3.classList.add("todox");
        element_4.classList.add("todox");                        

        tab_2.classList.add("active");

        borang_2.classList.add("active");    
        borang_2.classList.add("show");   
      }

      else if(counter == 2){
        element_1.classList.add("completedx"); 
        element_2.classList.add("completedx");       
        element_3.classList.add("activex");
        element_4.classList.add("todox");                        

        tab_3.classList.add("active");

        borang_3.classList.add("active");    
        borang_3.classList.add("show");   
      }

      else {
        element_1.classList.add("todox"); 
        element_2.classList.add("todox");       
        element_3.classList.add("todox");
        element_4.classList.add("todox");
      }
});
</script>  

                <!-- Bordered tabs-->
                <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                  <li class="nav-item flex-sm-fill">
                    <a id="b_pegawai-tab" data-toggle="tab" href="#b_pegawai" role="tab" aria-controls="b_pegawai" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Pegawai</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="b_pengajian-tab" data-toggle="tab" href="#b_pengajian" role="tab" aria-controls="b_pengajian" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Pengajian</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="b_tangg-tab" data-toggle="tab" href="#b_tangg" role="tab" aria-controls="b_tangg" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Tanggungan</a>
                  </li>
                </ul>

                <div id="myTab1Content" class="tab-content">
                  <div id="b_pegawai" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5">
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
        
