<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <h5>{{ env('APP_NAME') }}</h5>
  </div>
  <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('index') }}">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
      </svg> Dashboard</a>
    </li>
    @canany(['create users', 'view users'])
      <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
        </svg> Users</a>
        <ul class="c-sidebar-nav-dropdown-items">
          @can('create users')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('users.create') }}"><span class="c-sidebar-nav-icon"></span> Create</a></li>
          @endcan
        </ul>
      </li>
    @endcanany
    @can('view logs')
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('logs.index') }}" target="_blank">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
        </svg> Activity Logs</a>
      </li>
    @endcan
    <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
      </svg> Users</a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('users.create') }}"><span class="c-sidebar-nav-icon"></span> Create</a></li>
      </ul>
    </li>
  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>