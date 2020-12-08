@extends('layout')

@section('title', 'Edit Carriage')

@section('head-styles')
  @livewireStyles
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Carriages</li>
  <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Edit<strong> Carriage</strong></div>
    <div class="card-body">
      <livewire:carriages.edit :carriage="$carriage" />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection
