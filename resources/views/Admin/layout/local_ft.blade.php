        <!-- Begin Page Content -->
        <div class="container-fluid">
        <a href="/exportstudent"  class="btn btn-success d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-bottom: 12px"><i class="fas fa-download fa-sm text-white-50"></i> Muat Turun Senarai Pelajar</a>


          <!-- Page Heading -->
          <!--<h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Pelajar Sepenuh Masa Dalam Negara</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <!--<th>Id</th>-->
                      <th>Nama</th>
                      <th>No. IC</th> 
                      <th>Jabatan/Agensi</th>
                      <th>Gred</th>
                      <!--<th></th>-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <!--<th>Id</th>-->
                      <th>Nama</th>
                      <th>No. IC</th> 
                      <th>Jabatan/Agensi</th>
                      <th>Gred</th>
                      <!--<th></th>-->
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($local_ft as $key => $udata)
                    <tr>
                      <!--<td>{{ $udata -> user_id }}</td>-->
                      <td><a href="/ahliAMSAN/{{ $udata -> user_id }}">{{ $udata -> nama }}</a></td>
                      <td>{{ $udata -> nokp }}</td>
                      <td>{{ $udata -> jabatan }}</td>
                      <td>{{ $udata -> skim }}{{ $udata -> Gred }}</td>
                      <!--<td>
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-gray-900"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <form action="" method="post">
                              @csrf
                              @method('delete')                             
                              <a class="dropdown-item" href="/payment_rec/">{{ __('Rekod Pembayaran') }}</a>
                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Tekan Ok jika ingin menghapus pelajar?") }}') ? this.parentElement.submit() : ''">
                                  {{ __('Hapus Pelajar') }}
                                </button>
                            </form>    
                            <a class="dropdown-item" href="">{{ __('Edit') }}</a>
                            </div>
                        </div>                        
                      </td>-->
                    </tr>  
                    @endforeach              
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->