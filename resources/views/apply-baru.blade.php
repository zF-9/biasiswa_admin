@extends('layout.main')

@section('content')

<div id="content-wrapper" class="d-flex flex-column">
<div class="container-fluid mt--7">

<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-8">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Borang Permohonan</h6>
    </div>

    <form method="post" action="/permohonan_baru" enctype="multipart/form-data" autocomplete="off">
    {{ csrf_field() }}

    <div class="row">
      <div class="col-sm-12 col-md-9" style="align:center">
        <div id="dataTable_filter" class="dataTables_filter">
          <label>Nama:
              <input type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable" value="{{ old('name', auth()->user()->name) }}">
          </label>
        </div>
      </div>

      <div class="col-sm-12 col-md-9" style="align:center">
        <div id="dataTable_filter" class="dataTables_filter">
          <label>Email:
              <input type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable" value="{{ old('email', auth()->user()->email) }}">
          </label>
        </div>
      </div> 
    </div> 

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>No Kad Pengenalan:
            <input type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>     

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Jabatan:
            <input name="jabatan" type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>   

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Gred:
            <input name="jabatan" type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Jawatan:
            <input name="jabatan" type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Bidang:
            <input name="jabatan" type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>    

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Nama Universiti:
            <input name="jabatan" type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Kelulusan Akademik:
            <input name="jabatan" type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Nombor Telefon:
            <input name="jabatan" type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>

    <div class="col-sm-12 col-md-9" style="align:center">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Tarikh Perlantikan:
            <input name="jabatan" type="search" class="form-control form-control-lg" placeholder="" aria-controls="dataTable">
        </label>
      </div>
    </div>

    <div class="col-sm-12 col-md-9" style="align:center">
        <div class="form-group">
            <input id="statustw" type="checkbox" onclick="togglediv('uploadstatw')" name="is_ok[]" />
                <label class="form-control-label" for="input-tawaran" >
                    {{ __('Surat tawaran daripada Universiti') }}
                </label>
        </div>
        <div id="uploadstatw">
            <label class="stuni form-control-label" for="input-tawaran">{{ __('Surat Tawaran') }}</label>
                <div class="col-sm-9" style="padding-left: 0px;padding-top: 9px;padding-bottom: 12px">
                    <input name="tawaran" type="file" id="input_tawaran" class="custom-file-inputform-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>
                    <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                </div>
        </div>
    </div>

    <div class="surat-akuan col-sm-12 col-md-9" style="align:center">
        <label class="form-control-label" for="input_surakuan">{{ __('Surat Perakuan Dari Ketua Jabatan') }}</label>
        <div class="col-sm-9" style="padding-left: 0px;padding-top: 12px">
            <input name="surakuan" type="file" id="input-surakuan" class="custom-file-inputform-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
        </div>
    </div>                                                              

    <div class="text-right ol-sm-12 col-md-9">
        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
    </div>

</form>
  </div>
</div>      
</div>  
@endsection