@extends('layout.Admin.main_Admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Rekod Pembayaran</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

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
                      <th>Jumlah Dalam Ringgit Malaysia (RM)</th>
                      <th>Jenis Pembayaran</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <!--<th>Id</th>-->
                      <th>Tarikh Pembayaran</th>
                      <th>Nombor Baucer</th> 
                      <th>Jumlah Dalam Ringgit Malaysia (RM)</th>
                      <th>Jenis Pembayaran</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  <tr>
                  <form method="post" action="/update_pyrec/{{ $id }}" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}                      
                      <td>
                        <div class="form-group">
                          <!--<label>Tarikh Pembayaran</label>-->
                          <input name="date" type="text" class="form-control form-control-user date" id="Inputdate" maxlength="14">
                          <input name="month" id="m" style="display: none">
                          <input name="year" id="y" style="display: none">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <!--<label>Nombor Baucer</label>-->
                          <input name="baucer_no" type="text" class="form-control form-control-user" id="InputBaucer" maxlength="14">
                        </div>                        
                      </td>
                      <td>
                        <div class="form-group">
                          <!--<label>Jumlah Pembayaran</label>-->
                          <input name="jumlah" type="text" class="form-control form-control-user" value="" id="InputSum" maxlength="14">
                        </div>                          
                      </td>
                      <td>
                        <div class="form-group">
                          <!--<label>Jenis Pembayaran</label>-->
                          <input name="perkara" type="text" class="form-control form-control-user" id="InputJenis" maxlength="14">
                          <hr>
                          <div class="text-right">
                            <button type="submit" class="btn btn-success btn-user btn-block">{{ __('Save') }}
                            </button>
                          </div>
                        </div>                          
                      </td>
                      </form>
                    </tr>

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