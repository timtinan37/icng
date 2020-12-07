@extends('layout')

@section('title', 'Edit Policy Type')

@section('head-styles')
  @livewireStyles
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Policy Types</li>
  <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header">Edit<strong> Policy Type</strong></div>
    <div class="card-body">
      <livewire:policy-types.edit :policyType="$policyType" />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
@endsection