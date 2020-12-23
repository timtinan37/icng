@extends('layout')

@section('title', 'Edit Cover Note')

@section('head-styles')
  @livewireStyles
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Cover Notes</li>
  <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Edit<strong> Cover Note</strong></div>
    <div class="card-body">
      <livewire:cover-notes.edit :coverNote="$coverNote" :branches="$branches" :carriages="$carriages" :risks="$risks" :transits="$transits" />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection
