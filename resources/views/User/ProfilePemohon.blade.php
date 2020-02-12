@extends('layout.User.main_User')
@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-xl-9 col-lg-4 order-lg-4">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="storage/profilePic/{{ auth()->user()-> avatar }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                            </div>
                        </div>


                        <div class="text-center" id="profile_permohonan">
                            <h3>
                                <span class="font-weight-light">Nama : </span>{{ auth()->user()->name }}
                            </h3>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">No. Kad Pengenalan :</i>
                                {{ $user_profile -> nokp }}
                            </div>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2">Email : </i>{{ auth()->user()->email }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">Kementerian/Agensi :</i>{{ $user_profile -> jabatan}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">Jawatan :</i>{{ $user_profile -> jawatan}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">Gred :</i>{{ $user_profile -> Gred}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">Taraf Lantikan :</i>{{ $user_profile -> TarafLantik}}
                            </div>

                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">Umur :</i>
                                {{ $user_profile -> umur }}
                            </div>
                            <div class="h5 mt-4">Telefon No. :
                                <i class="ni business_briefcase-24 mr-2"></i>
                                {{ $user_profile -> telno }}
                            </div>
                            <div class="h5 mt-4">Telefon Pejabat No. :
                                <i class="ni business_briefcase-24 mr-2"></i>
                                {{ $user_profile -> telnoPej }}
                            </div>

                            <hr class="my-4" />
                            <p>Tarikh Daftar Ke Sistem :{{ auth()->user()->created_at }}</p>
                            <p>Tarikh Akhir Kemaskini :{{ auth()->user()->updated_at }}</p>
                            <br>
                            <a href="/pengajian">{{ __('Seterusnya') }}</a>
                            <br>
                            <a href="" data-toggle="modal" data-target="#avatarModal">Sila Muat Naik Gambar</a>
                        </div>
                    </div>
                </div>
            </div>

 <!--<div class="col-xl-8 p-5 bg-white rounded shadow mb-5">
     Bordered tabs
    <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
      <li class="nav-item flex-sm-fill">
        <a id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Pegawai</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Pengajian</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="contact1-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Contact</a>
      </li>
    </ul>
    <div id="myTab1Content" class="tab-content">
      <div id="home1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
        <p class="leade font-italic">nama: {{ auth()->user()->name }}</p>
        <p class="leade font-italic">No kad Pengenalan: {{ $user_profile->nokp }}</p>
        <p class="leade font-italic">Email: {{ $user_profile->email }}</p>
        <p class="leade font-italic">Jabatan: {{ $user_profile->jabatan }}</p>
        <p class="leade font-italic">Jawatan: {{ $user_profile->jawatan }}</p>
        <p class="leade font-italic">Gred: {{ $user_profile->Gred }}</p>
        <p class="leade font-italic">Taraf Pelantikan: {{ $user_profile->TarafLantik }}</p>
        <p class="leade font-italic">: {{ $user_profile->Gred }}</p>

        <p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

      <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
        <p class="leade font-italic">Email: {{ $user_profile->email }}</p>

        
        <p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div id="contact1" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
        <p class="leade font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
    End bordered tabs
  </div>-->

            <!--<div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
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
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->
        </div>
        
    </div>
@endsection



