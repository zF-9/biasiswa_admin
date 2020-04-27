@extends('layout.head') 

<body class="bg-gradient-primary bg_default">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akaun Baru!</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName" placeholder="Nama Penuh" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
                <!--<div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName" placeholder="First Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                </div>
                </div>-->
                <div class="form-group">
                  <input name="email" type="email" class="form-control-user form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Kata Laluan" required autocomplete="new-password">
                  </div>
                  <div class="col-sm-6">
                    <input name="password_confirmation" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulang Kata Laluan" required autocomplete="new-password">
                  </div>
                </div>
                <!--<a href="" class="btn btn-primary btn-user btn-block">-->
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Daftar') }}
                    </button>
                <!--</a>-->
                <!--<a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Daftar Dengan Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Daftar Dengan Facebook
                </a>-->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Lupa Kata Laluan?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Log Masuk</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  @extends('layout.js')
</body>