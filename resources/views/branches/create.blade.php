@extends('layout')

@section('title', 'Create Branch Office')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Branches</li>
  <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('head-styles')
  @livewireStyles
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Create<strong> Branch</strong></div>
    <div class="card-body">
      <livewire:branches.create />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection
