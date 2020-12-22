@extends('layout')

@section('title', 'Create Cover Note')

@section('head-styles')
  @livewireStyles
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Cover Notes</li>
  <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Create<strong> Cover Note</strong></div>
    <div class="card-body">
      <livewire:cover-notes.create :branches="$branches" :carriages="$carriages" :risks="$risks" :transits="$transits" />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection
