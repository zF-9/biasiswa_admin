@extends('layout.main')

@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>email</th> 
                      <th>Time Created</th>
                      <th>Time Updated</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>email</th> 
                      <th>Time Created</th> 
                      <th>Time Updated</th>

                    </tr>
                  </tfoot>
                  <tbody>

                    @foreach($penerima_biasiswa as $key => $data)
                    <tr>
                      <td>{{ $data -> id }}</td>
                      <td>{{ $data -> nama }}</td>
                      <td>{{ $data -> email }}</td>
                      <td>{{ $data -> nokp }}</td>
                      <td>{{ $data -> jabatan }}</td>
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