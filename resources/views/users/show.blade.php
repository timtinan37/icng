@extends('layout')

@section('title', "User - $user->id")

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Users</li>
  <li class="breadcrumb-item active">{{ $user->id }}</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> User Details</div>
    <div class="card-body">
      <table class="table table-responsive table-borderless">
        <tbody>
          <tr>
            <th scope="row" colspan="4">Id</th>
            <td>{{ $user->id }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Name</th>
            <td>{{ $user->name }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Email</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Email Verified At</th>
            <td>{{ $user->email_verified_at }}</td>
          </tr>
            <th scope="row" colspan="4">Created At</th>
            <td>{{ $user->created_at }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Updated At</th>
            <td>{{ $user->updated_at }}</td>
          </tr>
        </tbody>
      </table>
      <hr>
      @can('update users')
        <a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-primary">Edit</button></a>
      @endcan
    </div>
  </div>
</div>
@endsection
