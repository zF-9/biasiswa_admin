@extends('layout.Admin.main_Admin')
@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-4  mb-5 mb-xl-0">
                <div class="card card-profile">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-xl-9 col-lg-4 order-lg-4">
                            <div class="card-profile-image">
                                <a href="storage/profilePic/{{ $user_profile -> avatar }}">

                                    <img src="storage/profilePic/{{ $user_profile -> avatar }}" class="rounded-circle">
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
                            <!--<h3>
                                <span class="font-weight-light">Nama: </span>{{ auth()->user()->name }}
                            </h3>-->
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">Nama: </i>
                                {{ $user_profile -> name }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">No. Kad Pengenalan:</i>
                                {{ $user_profile -> nokp }}
                            </div>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2">Email: </i>{{ $user_profile -> email }}
                            </div>
                            <!--<div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $user_profile -> jabatan}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $user_profile -> jawatan}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $user_profile -> Gred}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $user_profile -> TarafLantik}}
                            </div>

                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>
                                {{ $user_profile -> umur }}
                            </div>-->
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">No. Tel (peribadi): </i>
                                {{ $user_profile -> telno }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2">No. Tel (pejabat): </i>
                                {{ $user_profile -> telnoPej }}
                            </div>
                            <!--<div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>-->
                            <hr class="my-4" />
                            <!--<p>A member since {{ auth()->user()->created_at }}</p>
                            <p>Last Updated {{ auth()->user()->updated_at }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                            <br>
                            <a href="" data-toggle="modal" data-target="#avatarModal">upload a pic</a>-->
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-xl-8 order-xl-2 p-5 bg-white rounded shadow mb-5">
                <!-- Bordered tabs-->
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
                    <p class="leade font-italic">nama: {{ $user_profile -> name }}</p>
                    <p class="leade font-italic">No kad Pengenalan: {{ $user_profile->nokp }}</p>
                    <p class="leade font-italic">Email: {{ $user_profile->email }}</p>
                    <p class="leade font-italic">Alamat: {{ $user_profile->alamat }}</p>
                    <p class="leade font-italic">taraf perkahwinan: {{ $user_profile->tarafkahwin }}</p>
                    <p class="leade font-italic">Jabatan: {{ $user_profile->jabatan }}</p>
                    <p class="leade font-italic">Jawatan: {{ $user_profile->jawatan }}</p>
                    <p class="leade font-italic">Gred: {{ $user_profile->Gred }}</p>
                    <p class="leade font-italic">Taraf Pelantikan: {{ $user_profile->TarafLantik }}</p>
                    <p class="leade font-italic">Tarikh Sah Jawatan: {{ $user_profile->Tsahjwtn }}</p>

                    <!--<p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                      irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>-->
                  </div>

                  <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                    <p class="leade font-italic">Kursus Dipohon: {{ $user_profile->AppliedKursus }}</p>
                    <p class="leade font-italic">Pengajian: {{ $user_profile->AkademikInfo }}</p>
                    <p class="leade font-italic">Tarikh Mula: {{ $user_profile->startStudy }}</p>
                    <p class="leade font-italic">Tarikh Tamat: {{ $user_profile->EndStudy }}</p>
                    <p class="leade font-italic">Nama Universiti: {{ $user_profile->Uni_name }}</p>
                    <p class="leade font-italic">Mod Pengajian: {{ $user_profile->mod_pengajian }}</p>
                    <p class="leade font-italic">lokasi pengajian: {{ $user_profile->tmpt_study }}</p>
                    <p class="leade font-italic">
                        Surat Tawaran Universiti: <a href="storage/{{ $user_profile->tawaran }}">File</a>
                    </p>
                    <p class="leade font-italic">
                        Surat Akuan Ketua Jabatan: <a href="storage/{{ $user_profile->surakuan }}">File</a>
                    </p>

                    
                    <!--<p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                      irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>-->
                  </div>
                  <div id="contact1" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                    <p class="leade font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                      irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                      irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                </div>
                <!-- End bordered tabs -->
                <!--<hr class="my-4" />-->
              </div>
</div>
        
</div>
@endsection



