@extends('layout')

@section('title', 'Create User')

@section('head-styles')
  @livewireStyles
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Users</li>
  <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Create<strong> User</strong></div>
    <div class="card-body">
      <livewire:user-form />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection