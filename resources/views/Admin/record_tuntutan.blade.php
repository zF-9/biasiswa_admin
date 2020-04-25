@extends('Admin.layout.main_Admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Rekod Pembayaran</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Pembayaran: {{ $user_data -> name }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <!--<th>Id</th>-->
                      <th>Tarikh Pembayaran</th>
                      <th>Nombor Baucer</th> 
                      <th>Jenis Pembayaran</th>
                      <th>Tempoh Pembayaran</th>
                      <th>Jumlah (RM)</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <!--<th>Id</th>-->
                      <th>Tarikh Pembayaran</th>
                      <th>Nombor Baucer</th> 
                      <th>Jenis Pembayaran</th>
                      <th>Tempoh Pembayaran</th>
                      <th>Jumlah (RM)</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  <tr>
                  <form method="post" action="/update_pyrec/{{ $id }}/{{ $pid }}" enctype="multipart/form-data" autocomplete="off">
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
                          <select name="perkara" value="" class="form-control form-group form-control-user" id="InputJenis"  placeholder="Sila Pilih Jenis Pembayaran">
                          <option>Yuran Pengajian</option>
                          <options>Tuntutan</option>
                          <options>Elaun Biasiswa</option>
                          <option>Elaun Sara Hidup</option>
                          <option>Penginapan</option>
                          <option>Elaun Buku</option>
                          <option>Elaun Alat Perkakas</option>
                          <option>Elaun Tesis</option>
                          <option>Elaun Latihan Amali</option>
                          <option>Elaun Penempatan</option>
                          <option>Elaun Akhir Pengajian</option>
                          <option>Elaun Bantuan Sewa Rumah</option>
                          <option>Elaun Bantuan Keluarga</option>
                          <option>Elaun Pakaian Panas</option>
                          <option>Elaun Pakaian</option>
                          <option>Elaun Tangunggan</option>
                          <option>Elaun Perjalanan</option>
                        </select>
                        <script type="text/javascript">
                          var jenis = '{{ $claim_info -> perkara }}';
                          var selection = document.getElementById('InputJenis');
                            for (var i = 0; i < selection.options.length; i++) {
                              if (selection.options[i].text === jenis) {
                                selection.selectedIndex = i;
                                //alert(selection.selectedIndex);
                                break;
                              }
                            } 
                        </script>
                        </div>   
                      </td>
                      <td>
                        <div class="form-group">
                          <!--<label>Jumlah Pembayaran</label>-->
                          <input name="tempoh" type="text" class="form-control form-control-user" value="{{ $claim_info -> tempoh }}" id="InputTempoh" maxlength="14">
                        </div>                                           
                      </td>
                      <td>  
                        <div class="form-group">
                          <!--<label>Jenis Pembayaran</label>-->
                          <input name="jumlah" type="text" class="form-control form-control-user" value="{{ $claim_info -> tuntutan }}" id="InputSum" maxlength="14">
                          <div class="text-right">
                            <button type="submit" class="btn btn-success btn-user btn-block">{{ __('Hantar') }}
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
                      <td>{{ $data -> jenis_pymnt }}</td>
                      <td>{{ $data -> tempoh }}</td>
                      <td>{{ $data -> amount }}</td>
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