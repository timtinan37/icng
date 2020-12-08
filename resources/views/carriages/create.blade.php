@extends('layout')

@section('title', 'Create Carriage')

@section('head-styles')
  @livewireStyles
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Carriages</li>
  <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Create<strong> Carriage</strong></div>
    <div class="card-body">
      <livewire:carriages.create />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection
