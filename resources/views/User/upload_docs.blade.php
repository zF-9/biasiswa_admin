@extends('layout.User.main_User')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Muat Naik Dokumen/Keputusan</h1>
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
                      <th>Tarikh Muatnaik</th>
                      <th>Jenis Tuntutan</th> 
                      <th>Tempoh Tuntutan</th> 
                      <th>Jumlah (RM)</th> 
                      <th>Rujukan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tarikh Muatnaik</th>
                      <th>Jenis Tuntutan</th> 
                      <th>Tempoh Tuntutan</th> 
                      <th>Jumlah (RM)</th> 
                      <th>Rujukan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <tr>
                  <form method="post" action="/serahan" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}                      
                      <td>
                        <div class="form-group">
                          <!--<label>Tarikh Pembayaran</label>-->
                          <input name="date_up" type="text" class="form-control form-control-user date" id="Inputdate" maxlength="14">
                        </div>
                      </td>
                      <td>
                      <div class="form-group">
                        <select name="thewhat" class="form-group form-control-user" id="InputBaucer"  placeholder="Sila Pilih Jenis Tuntutan">
                          <option>Yuran Pengajian</option>
                          <option>Tuntutan</option>
                          <option>Elaun Biasiswa</option>
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
                    </div>                       
                      </td>
                      <td>
                        <div class="form-group">
                          <input name="tempoh" type="text" class="form-control form-control-user" id="" maxlength="30">
                        </div>                        
                      </td> 
                      <td>
                        <div class="form-group">
                          <input name="tuntutan" type="text" class="form-control form-control-user" id="" maxlength="30">
                        </div>                        
                      </td> 
                      <td>
                        <div class="col-sm-9" style="padding-left: 0px;padding-top: 9px">
                            <input name="dokumen" multiple="multiple" type="file" id="input-dokumen" class="custom-file-inputform-control form-control-alternative" placeholder="" value="" required="" autofocus="">
                            <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                        </div>   
                          <hr>
                          <div class="text-right">
                            <button type="submit" class="btn btn-success btn-user btn-block">{{ __('Save') }}
                            </button>
                          </div>                          
                      </td>
                      </form>
                    </tr>   

                    @foreach($list_docs as $key => $data)
                    <tr>
                      <td>{{ $data -> date_penyerahan }}</td>
                      <td>{{ $data -> perkara }}</td>
                      <td>{{ $data -> tempoh }}</td>
                      <td>{{ $data -> tuntutan }}</td>
                      <td><a href="{{ $data -> file }}">File Rujukan</a></td>
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