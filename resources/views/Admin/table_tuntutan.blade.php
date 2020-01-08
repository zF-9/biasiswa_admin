@extends('layout.Admin.main_Admin')

@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!--<h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Tuntutan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

                    <th>Nama Penuntut</th>
                      <th>Tarikh Tuntutan</th>
                      <th>Jenis Tuntutan</th> 
                      <th>Tempoh Tuntutan</th> 
                      <th>Jumlah Tuntutan</th>    
                      <th>Muat Turun Rujukan Tuntutan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>

                      <th>Nama Penuntut</th>
                      <th>Tarikh Tuntutan</th>
                      <th>Jenis Tuntutan</th> 
                      <th>Tempoh Tuntutan</th> 
                      <th>Jumlah Tuntutan</th>                     
                      <th>Muat Turun Rujukan Tuntutan</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($tuntutan as $key => $data)
                    <tr>
                      <td>{{ $data -> name }}</td>
                      <td>{{ $data -> date_penyerahan }}</td>
                      <td>{{ $data -> perkara }}</td>
                      <td>{{ $data -> tempoh }}</td>
                      <td>{{ $data -> tuntutan }}</td>
                      <td>{{ $data -> file}}</td>
                      <td>
                      </td>
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