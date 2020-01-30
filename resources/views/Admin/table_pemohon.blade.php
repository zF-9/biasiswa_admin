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
              <h6 class="m-0 font-weight-bold text-primary">Senarai Pemohon</h6>
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
                    @foreach($data_pemohon as $key => $data)
                    <tr>
                      <td>{{ $data -> user_id }}</td>
                      <td>{{ $data -> nama }}</td>
                      <td>{{ $data -> email }}</td>
                      <td>{{ $data -> nokp }}</td>
                      <td>{{ $data -> AkademikLvl }}</td>
                  
                      <td>
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-gray-900"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            @if ($data->user_id != auth()->id())
                            <form action="" method="post">
                              @csrf
                             <!-- @method('delete')-->                            
                             <a class="dropdown-item" href="/approve/{{ $data -> user_id }}">Terima</a>
                             <button  type="button" class="dropdown-item" href="" data-toggle="modal" data-target="#budgetModal" data-id="{{ $data -> user_id }}">
                              Terima Sebagai Pelajar
                              </a>
                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                  {{ __('Hapus') }}
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

  <script type="text/javascript">
      $(document).ready(function(){
          $("#dataTable button").click(function(){ 
              var trElem = $(this).closest("tr");
              var secondTd = $(trElem).children("td")[1]; //nama

              //alert($(secondTd).text())

              $('#user_id').val($(secondTd).text());
          })
      })
  </script>


                       <!-- modal add budget -->
                       <div id="budgetModal" class="modal" tabindex="-1" role="dialog">
                       <div class="modal-dialog" role="document">
                       <div class="modal-content">

                       <div class="modal-header">
                       <h5 class="modal-title">Sila Masukkan Peruntukan Pembiayaan Pelajar</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       </button>
                       </div>

                       <div class="modal-body">

                       <div class="container">
                       <div class="row">
                       <div class="col-md-10 col-md-offset-1">
                        
                        <form enctype="multipart/form-data" action="/approve">
                        {{ csrf_field() }}
                        <h5>Nama Pelajar : </h5><input name="student" type="text" id="user_id" >
                        <input name="budget" type="text" class="form-control form-control-user" id="" maxlength="30" placeholder="Sila Masukkan Nilai Dalam (RM) e.g 20000">
                            <button type="button submit" style="margin-top:12px; margin-bottom: 12px" class="btn btn-primary">Hantar</button>
                        </form>
                    </div>
                </div>
            </div>

                            <div class="modal-footer">              
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>  
                      </div>
                      </div>
                    </div>  
                </div>
               <!-- modal add budget -->
                      

@endsection