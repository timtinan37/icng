@extends('layout')

@section('title', "Risk - $risk->id")

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Risks</li>
  <li class="breadcrumb-item active">{{ $risk->id }}</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Risk Details</div>
    <div class="card-body">
      <table class="table table-responsive table-borderless">
        <tbody>
          <tr>
            <th scope="row" colspan="4">Id</th>
            <td>{{ $risk->id }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Name</th>
            <td>{{ $risk->name }}</td>
          </tr>
            <th scope="row" colspan="4">Created At</th>
            <td>{{ $risk->created_at }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Updated At</th>
            <td>{{ $risk->updated_at }}</td>
          </tr>
        </tbody>
      </table>
      <hr>
      @can('update risks')
        <a href="{{ route('risks.edit', $risk->id) }}"><button class="btn btn-primary">Edit</button></a>
      @endcan
    </div>
  </div>
</div>
@endsection
