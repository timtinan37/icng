<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <h5 class="c-sidebar-brand-full">{{ env('APP_NAME') }}</h5>
    <h5 class="c-sidebar-brand-minimized">{{ env('APP_NAME') }}</h5>
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
    @canany(['create cover notes', 'view cover notes'])
      <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
        </svg> Cover Notes</a>
        <ul class="c-sidebar-nav-dropdown-items">
          @can('view cover notes')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('cover-notes.index') }}"><span class="c-sidebar-nav-icon"></span> List</a></li>
          @endcan
          @can('create cover notes')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('cover-notes.create') }}"><span class="c-sidebar-nav-icon"></span> Create</a></li>
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
    @canany(['create branches', 'view branches'])
      <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
        </svg> Branches</a>
        <ul class="c-sidebar-nav-dropdown-items">
          @can('view branches')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('branches.index') }}"><span class="c-sidebar-nav-icon"></span> List</a></li>
          @endcan
          @can('create branches')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('branches.create') }}"><span class="c-sidebar-nav-icon"></span> Create</a></li>
          @endcan
        </ul>
      </li>
    @endcanany
    @canany(['create transits', 'view transits'])
      <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
        </svg> Transits</a>
        <ul class="c-sidebar-nav-dropdown-items">
          @can('view transits')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('transits.index') }}"><span class="c-sidebar-nav-icon"></span> List</a></li>
          @endcan
          @can('create transits')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('transits.create') }}"><span class="c-sidebar-nav-icon"></span> Create</a></li>
          @endcan
        </ul>
      </li>
    @endcanany
    @canany(['create carriages', 'view carriages'])
      <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
        </svg> Carriages</a>
        <ul class="c-sidebar-nav-dropdown-items">
          @can('create carriages')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('carriages.create') }}"><span class="c-sidebar-nav-icon"></span> Create</a></li>
          @endcan
        </ul>
      </li>
    @endcanany
    @canany(['create risks', 'view risks'])
      <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('/coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
        </svg> Risks</a>
        <ul class="c-sidebar-nav-dropdown-items">
          @can('create risks')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('risks.create') }}"><span class="c-sidebar-nav-icon"></span> Create</a></li>
          @endcan
        </ul>
      </li>
    @endcanany

  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>