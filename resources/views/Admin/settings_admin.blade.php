@extends('layout.Admin.main_Admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Admin Settings</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Toggle</h6>
            </div>
            <div class="card-body">
                <form class="user" method="post" action="/save_setting" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}
            <div class="row">

            <!-- switch toggle button panel --> 
            <div class="card shadow mb-4 col-xl-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Filter: full</h6>
                </div>
                <div class="card-body">
                  <div class="panel-body">
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                      <input name="toggle_1" type="checkbox" class="custom-control-input" id="customSwitches1" value="1" onchange="toggler_fx()">
                      <label class="custom-control-label" for="customSwitches1">Enable</label>
                    </div>
                  </div>
                </div>
            </div>
            <!-- switch toggle button panel --> 

            <!-- switch toggle button panel --> 
            <div class="card shadow mb-4 col-xl-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Filter: part time studies</h6>
                </div>
                <div class="card-body">
                  <div class="panel-body">
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                      <input name="toggle_2" type="checkbox" class="custom-control-input" id="customSwitches2" value="2" onchange="toggler_fx()">
                      <label class="custom-control-label" for="customSwitches2">Enable</label>
                    </div>
                  </div>
                </div>
            </div>
            <!-- switch toggle button panel --> 

            <!-- switch toggle button panel --> 
            <div class="card shadow mb-4 col-xl-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Filter: none</h6>
                </div>
                <div class="card-body">
                  <div class="panel-body">
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                      <input name="toggle_3" type="checkbox" class="custom-control-input" id="customSwitches3" value="3" onchange="toggler_fx()">
                      <label class="custom-control-label" for="customSwitches3">Enable</label>
                    </div>
                  </div>
                </div>
            </div>
            <!-- switch toggle button panel --> 
            
            <script type="text/javascript">
                  var index_toggler = '{{ $index }}';
                  var toggle_01 = document.getElementById('customSwitches1');
                  var toggle_02 = document.getElementById('customSwitches2');
                  var toggle_03 = document.getElementById('customSwitches3');
                  //alert(index_toggler);
                  if(index_toggler == '1'){
                      toggle_01.checked = true;
                  }
                  else if(index_toggler == '2'){
                      toggle_02.checked = true;
                  }
                  else if(index_toggler == '3'){
                      toggle_03.checked = true;
                  }
            </script>

              <!--<label>Jenis Pembayaran</label>-->
              <div class="text-right" style="float: right">
                <button type="submit" class="btn btn-success btn-user btn-block">{{ __('Kemas Kini') }}
                </button>
              </div>


          </div>
               @csrf
              </form>

            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
@endsection

       
