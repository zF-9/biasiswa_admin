@extends('Admin.layout.main_Admin')

@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <a href="/exportstudent"  class="btn btn-success d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-bottom: 12px"><i class="fas fa-download fa-sm text-white-50"></i> Muat Turun Senarai Pelajar</a>


          <!-- Page Heading -->
          <!--<h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Pelajar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>email</th> 
                      <th>No. Kad Pengenalan</th>
                      <th>Jenis Kursus</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>email</th> 
                      <th>No. Kad Pengenalan</th>
                      <th>Jenis Kursus</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                     @foreach($data_student as $key => $user_data)
                    <tr>
                      <td>{{ $user_data -> id }}</td>
                      <td><a href="{{ route('profile_viewer', [$user_data -> id ]) }}">{{ $user_data -> nama }}</a></td>
                      <!-- "/{{$user_data -> user_id}}" -->
                      <td>{{ $user_data -> email }}</td>
                      <td>{{ $user_data -> nokp }}</td>
                      <td>{{ $user_data -> AkademikLvl }}</td>
                      <td>
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-gray-900"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            @if ($user_data->user_id != auth()->id())
                            <form action="" method="post">
                              @csrf
                              @method('delete')                             
                              <a class="dropdown-item" href="/payment_rec/{{ $user_data -> user_id }}">{{ __('Rekod Pembayaran') }}</a>
                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Tekan Ok jika ingin menghapus pelajar?") }}') ? this.parentElement.submit() : ''">
                                  {{ __('Hapus Pelajar') }}
                                </button>
                            </form>    
                            @else
                            <a class="dropdown-item" href="">{{ __('Edit') }}</a>
                            @endif
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