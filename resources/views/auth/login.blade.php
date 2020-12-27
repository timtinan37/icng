@extends('layout')

@section('title', 'Login')

@section('body')
  <body class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 col-sm-12">
          <div class="card-group">
            <div class="card p-4">
              <form method="POST" action="{{ route('login') }}">
                  @csrf
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-muted">Sign In to your account</p>
                  <i>Creds: admin@example.com, password = password</i>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                        </svg></span></div>
                    
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="admin@example.com" required autocomplete="email" autofocus>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                        </svg></span></div>
                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <div class="col-6 text-right">
                      @if (Route::has('password.request'))
                        <button class="btn btn-link px-0" type="button">
                              <a class="btn btn-link" href="{{ route('password.request') }}">Forgot password?
                              </a>
                        </button>
                      @endif
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <!--[if IE]><!-->
    <script src="{{ asset('/coreui/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
    <!--<![endif]-->

  </body>
@endsection