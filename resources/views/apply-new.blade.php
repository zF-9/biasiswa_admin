@extends('layout.main')

@section('content')

<div id="content-wrapper" class="d-flex flex-column">
<div class="container-fluid mt--7">



        <div class="row">
            <div class="col-xl-8 order-xl-8">
                <div class="card bg-secondary">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Borang Permohonan') }}</h3>
                            </div>

                            <!--<div class="col-4 text-right">
                                <a href="" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>-->
                            <!-- button, klu ada guna nnt enable -->

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- action="": action should route pigi ControllerName@MethodName yang kena declare dalam controller -->
                        <form method="post" action="/permohonan_baru" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                            <!--@method('put')-->

                            <h6 class="heading-small text-muted mb-4">{{ __('Permohonan Baru') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif                           

                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nama">{{ __('Nama') }}</label>
                                    <input type="text" name="nama" id="input-nama" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    <!--@if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif-->
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    <!--@if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif-->
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nokp">{{ __('No Kad Pengenalan') }}</label>
                                    <input type="text" name="nokp" id="input-nokp" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="e.g. 901231127564" value="" required autofocus>

                                    <!--@if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nokp') }}</strong>
                                        </span>
                                    @endif-->
                                    <!-- ini untuk re-evaluate stuffs inside database -->
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jabatan">{{ __('Jabatan') }}</label>
                                    <input type="text" name="jabatan" id="input-jabatan" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nama Jabatan" value="" required autofocus>

                                    <!--@if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jabatan') }}</strong>
                                        </span>
                                    @endif-->
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jawatan">{{ __('Jawatan') }}</label>
                                    <input type="text" name="jawatan" id="input-jawatan" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Jawatan hakiki yang dipegang" value="" required autofocus>

                                    <!--@if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jabatan') }}</strong>
                                        </span>
                                    @endif-->
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bidang">{{ __('Bidang') }}</label>
                                    <input type="text" name="bidang" id="input-bidang" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Bidang" value="" required autofocus>

                                    <!--@if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bidang') }}</strong>
                                        </span>
                                    @endif-->
                                </div>                                

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-universiti">{{ __('Universiti') }}</label>
                                    <input type="text" name="universiti" id="input-universiti" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nama Universiti" value="" required autofocus>

                                    <!--@if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jabatan') }}</strong>
                                        </span>
                                    @endif-->
                                </div>

                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-akademik">{{ __('Kelulusan Akademik') }}</label>
                                    <input type="text" name="akademik" id="input-akademik" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="e.g Bachelor Degree in Civil Engineering" value="" required autofocus>

                                    <!--@if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jabatan') }}</strong>
                                        </span>
                                    @endif-->
                                </div>

                                <div class="form-group">
                                    <input id="statustw" type="checkbox" onclick="togglediv('uploadstatw')" name="is_ok[]" />
                                    <label class="form-control-label" for="input-tawaran" >
                                        {{ __('Surat tawaran daripada Universiti') }}
                                    </label>
                                </div>

<!--<div class="details" style="display:none">HIDDEN CONTENT</div>
<a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'See Less Details':'See More Details');});">See More Details</a>-->

                                <!--<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">-->
                                <div id="uploadstatw">
                                    <label class="stuni form-control-label" for="input-tawaran">{{ __('Surat Tawaran') }}</label>
                                    <div class="col-sm-9" style="padding-left: 0px;padding-top: 9px;padding-bottom: 12px">
                                        <input name="tawaran" type="file" id="input_tawaran" class="custom-file-inputform-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>
                                        <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                                    </div>
                                </div>
                                <!--</div>-->

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-telno">{{ __('Nombor Telefon') }}</label>
                                    <input type="text" name="telno" id="input-telno" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="e.g. 0128020182" value="" required autofocus>
                                </div>

            <!-- remake kasi jadi semat dulu cuba  -->
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tarikhlantik">{{ __('Tarikh Perlantikan') }}</label>
                                    <input type="text" name="tarikhlantik" id="input-tarikhlantik" class=" date form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>

                                    <!--@if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jabatan') }}</strong>
                                        </span>
                                    @endif-->
                                </div>            
            
            <!--<div class="container">
                <h1>Laravel Bootstrap Datepicker</h1>
                <input class="date form-control" type="text">
            </div>-->
 

                                <!--<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">-->
                                <div class="surat-akuan">
                                    <label class="form-control-label" for="input_surakuan">{{ __('Surat Perakuan Dari Ketua Jabatan') }}</label>
                                    <div class="col-sm-9" style="padding-left: 0px;padding-top: 12px">
                                        <input name="surakuan" type="file" id="input-surakuan" class="custom-file-inputform-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>
                                        <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                                    </div>
                                </div>
                                <!--</div>-->                                                                

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>

                                <!--<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tarikhlantik">{{ __('Tarikh Perlantikan') }}</label>
                                    <input type="text" name="jtarikhlantik" id="input-tarikhlantik" class=" date form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" value="" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jabatan') }}</strong>
                                        </span>
                                    @endif
                                </div> -->                               

                            </div> <!-- class="pl-lg-4" pny ending -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $('.date').datepicker({  
                format: 'dd-mm-yyyy'
            });  
        </script> 

        <script type="text/javascript">
            //document.getElementById('statustw').onchange = function() {
            //    document.getElementById('uploadstatw').style.visibility = 'hidden';
            //}
            //document.getElementById('closelogin').onclick = function() {
            //    document.getElementById('login').style.visibility = 'hidden';
            //}

            window.onload = function() {
                document.getElementById('uploadstatw').style.display = 'none';
            };

            function togglediv(id) {
                var div = document.getElementById(id);
                div.style.display = div.style.display == "none" ? "block" : "none";
            }                                           
        </script>
        
    </div>
@endsection
