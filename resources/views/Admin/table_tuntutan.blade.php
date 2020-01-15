@extends('layout.Admin.main_Admin')

@section('content')

        <!-- Begin Page Content -->
  
        <div class="container-fluid">
        <a href="/exportchart"  class="btn btn-success d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Muat Turun Senarai Tuntutan</a>

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
                      <th>Nama </th>
                      <th>Tarikh</th>
                      <th>Jenis</th> 
                      <th>Tempoh</th> 
                      <th>Jumlah(RM)</th>                     
                      <th>Rujukan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama </th>
                      <th>Tarikh</th>
                      <th>Jenis</th> 
                      <th>Tempoh</th> 
                      <th>Jumlah(RM)</th>                     
                      <th>Rujukan</th>
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
<<<<<<< HEAD
                      <td><a href="{{ $data -> file}}">{{ $data -> file}}</a></td>
=======
                      <td><a href="storage/{{ $data -> file}}">Rujukan</a></td>
>>>>>>> f40b4109c86f3677c6d17aac3295d48e961113ff
                      <td>
                      <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-gray-900"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <form action="" method="post">
                              @csrf                            
                              <a class="dropdown-item" href="/tuntutan_pay/{{ $data -> id }}/{{ $data -> date_penyerahan }}">{{ __('Membuat Pembayaran') }}</a>
                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Tekan Ok jika ingin menghapus pelajar?") }}') ? this.parentElement.submit() : ''">
                                  {{ __('Hapus Pelajar') }}
                                </button>
                            </form>    
                            <a class="dropdown-item" href="">{{ __('Edit') }}</a>
                            </div>
                        </div>                         
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