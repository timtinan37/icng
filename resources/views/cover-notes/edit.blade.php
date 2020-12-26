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
      <livewire:cover-notes.edit :coverNote="$coverNote" :branches="$branches" :risks="$risks" :transits="$transits" />
    </div>
  </div>
</div>
@endsection

@section('tail-scripts')
  @livewireScripts
  <script src="{{ asset('js/cover-notes/edit/manifest.js') }}"></script>
  <script src="{{ asset('js/cover-notes/edit/vendor.js') }}"></script>
  <script src="{{ asset('js/cover-notes/edit/edit.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      setTimeout(()=>{
        document.getElementById("{{ $coverNote->carriage_id }}carriage").setAttribute("selected", "");
      }, 1200);
    });
  </script>
@endsection
