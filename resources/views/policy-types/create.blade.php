@extends('layout')

@section('title', 'Create Policy Type')

@section('head-styles')
  @livewireStyles
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Policy Types</li>
  <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Create<strong> Policy Type</strong></div>
    <div class="card-body">
      <livewire:policy-types.create />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection