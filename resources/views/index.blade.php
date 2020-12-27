@extends('layout')

@section('title', 'Dashboard')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item active">Dashboard</li>
</ol>
@endsection

@section('content')
  <div class="fade-in">
		<div class="row">
	    <div class="col-sm-6 col-lg-3">
	      <div class="card text-white bg-gradient-primary">
	        <div class="card-body card-body pb-5 d-flex justify-content-between align-items-start">
	          <div>
	            <div class="text-value-lg">{{ $coverNotes }}</div>
	            <div>Issued Cover Notes</div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- /.col-->
	    <div class="col-sm-6 col-lg-3">
	      <div class="card text-white bg-gradient-primary">
	        <div class="card-body card-body pb-5 d-flex justify-content-between align-items-start">
	          <div>
	            <div class="text-value-lg">{{ $branches }}</div>
	            <div>Branch Offices</div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- /.col-->
	    <div class="col-sm-6 col-lg-3">
	      <div class="card text-white bg-gradient-primary">
	        <div class="card-body card-body pb-5 d-flex justify-content-between align-items-start">
	          <div>
	            <div class="text-value-lg">{{ $users }}</div>
	            <div>Users</div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- /.col-->
	    <div class="col-sm-6 col-lg-3">
	      <div class="card text-white bg-gradient-primary">
	        <div class="card-body card-body pb-5 d-flex justify-content-between align-items-start">
	          <div>
	            <div class="text-value-lg">{{ $risks }}</div>
	            <div>Risk Coverages</div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- /.col-->
	  </div>
  </div>
@endsection
