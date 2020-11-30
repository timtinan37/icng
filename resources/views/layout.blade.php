<!DOCTYPE html>
<html lang="en">
  @include('head')
  
  @section('body')
    <body class="c-app">

      @include('sidebar')

      <div class="c-wrapper c-fixed-components">
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
          <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <svg class="c-icon c-icon-lg">
              <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
            <svg class="c-icon c-icon-lg">
              <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <svg class="c-icon">
                  <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                </svg></a></li>
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <svg class="c-icon">
                  <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
                </svg></a></li>
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <svg class="c-icon">
                  <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                </svg></a></li>
            <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('/coreui/assets/img/avatars/6.jpg') }}" alt="user@email.com"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2"><strong>@auth {{ Auth::user()->name }} @endauth</strong></div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <svg class="c-icon mr-2">
                    <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                  </svg> {{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </li>
          </ul>
          <div class="c-subheader px-3">
            <!-- Breadcrumb-->
            @yield('breadcrumb')
            <!-- Breadcrumb Menu-->
          </div>
        </header>
        <div class="c-body">
          <main class="c-main">
            <div class="container-fluid">
              <div class="fade-in">
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                @yield('content')
              </div>
            </div>
          </main>
          <footer class="c-footer">
            <div>© {{ now()->year }} Tariq Imtinan</div>
          </footer>
        </div>
      </div>
      <!-- CoreUI and necessary plugins-->
      <script src="{{ asset('/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
      <!--[if IE]><!-->
      <script src="{{ asset('/coreui/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
      <!--<![endif]-->

      @yield('tail-scripts')
    </body>
  @show
</html>