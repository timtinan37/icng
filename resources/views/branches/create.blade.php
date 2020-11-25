@extends('layout')

@section('title', 'Create Branch Office')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Branches</li>
  <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')

<div class="col-md-10">
  <div class="card">
    <div class="card-header">Create<strong> Branch</strong></div>
    <div class="card-body">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <label class="col-md-3 col-form-label" for="name">Name</label>
          <div class="col-md-9">
            <input class="form-control" id="name" type="text" name="name" placeholder="Name of the branch">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 col-form-label" for="email">Email</label>
          <div class="col-md-9">
            <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email" autocomplete="email">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 col-form-label" for="phone_number">Phone Number</label>
          <div class="col-md-9">
            <input class="form-control" id="phone_number" type="text" name="phone_number" placeholder="Phone no. of the branch">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 col-form-label" for="address">Address</label>
          <div class="col-md-9">
            <textarea class="form-control" id="address" name="address" rows="9" placeholder="Address of the branch.."></textarea>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
          <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection