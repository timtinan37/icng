@extends('layout')

@section('title', "Carriage - $carriage->id")

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Carriages</li>
  <li class="breadcrumb-item active">{{ $carriage->id }}</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Carriage Details</div>
    <div class="card-body">
      <table class="table table-responsive table-borderless">
        <tbody>
          <tr>
            <th scope="row" colspan="4">Id</th>
            <td>{{ $carriage->id }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Name</th>
            <td>{{ $carriage->name }}</td>
          </tr>
            <th scope="row" colspan="4">Created At</th>
            <td>{{ $carriage->created_at }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Updated At</th>
            <td>{{ $carriage->updated_at }}</td>
          </tr>
        </tbody>
      </table>
      <hr>
      @can('update carriages')
        <a href="{{ route('carriages.edit', $carriage->id) }}"><button class="btn btn-primary">Edit</button></a>
      @endcan
    </div>
  </div>
</div>
@endsection
