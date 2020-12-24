@extends('layout')

@section('title', 'Edit User Permissions')

@section('head-styles')
  @livewireStyles
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Users</li>
  <li class="breadcrumb-item active">Permissions</li>
</ol>
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Edit<strong> User Permissions</strong></div>
    <div class="card-body">
      <form class="form-horizontal" action="{{ route('users.givePermissions', $user->id) }}" method="post">
        @csrf
        @foreach ($permissions as $permission)
          <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="{{ $permission->id }}" name="permission{{ $permission->id }}" type="checkbox" value="{{ $permission->name }}" @if ($user->permissions->contains($permission)) checked @endif>
            <label class="form-check-label" for="{{ $permission->id }}" style="text-transform: capitalize">{{ $permission->name }}</label>
          </div><br>
        @endforeach
        <div class="card-footer mt-3">
          <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
          <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection