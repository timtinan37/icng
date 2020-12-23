@extends('layout')

@section('title', "Branch - $branch->id")

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Branches</li>
  <li class="breadcrumb-item active">{{ $branch->id }}</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Branch Details</div>
    <div class="card-body">
      <table class="table table-responsive table-borderless">
        <tbody>
          <tr>
            <th scope="row" colspan="4">Id</th>
            <td>{{ $branch->id }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Name</th>
            <td>{{ $branch->name }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Address</th>
            <td>{{ $branch->address }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Phone Number</th>
            <td>{{ $branch->phone_number }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Fax Number</th>
            <td>{{ $branch->fax_number }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Email</th>
            <td>{{ $branch->email }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Created At</th>
            <td>{{ $branch->created_at }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Updated At</th>
            <td>{{ $branch->updated_at }}</td>
          </tr>
        </tbody>
      </table>
      <hr>
      @can('update branches')
        <a href="{{ route('branches.edit', $branch->id) }}"><button class="btn btn-primary">Edit</button></a>
      @endcan
    </div>
  </div>
</div>
@endsection
