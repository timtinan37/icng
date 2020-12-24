@extends('layout')

@section('title', "Transit - $transit->id")

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Transits</li>
  <li class="breadcrumb-item active">{{ $transit->id }}</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Transit Details</div>
    <div class="card-body">
      <table class="table table-responsive table-borderless">
        <tbody>
          <tr>
            <th scope="row" colspan="4">Id</th>
            <td>{{ $transit->id }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Name</th>
            <td>{{ $transit->name }}</td>
          </tr>
            <th scope="row" colspan="4">Created At</th>
            <td>{{ $transit->created_at }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Updated At</th>
            <td>{{ $transit->updated_at }}</td>
          </tr>
        </tbody>
      </table>
      <hr>
      @can('update transits')
        <a href="{{ route('transits.edit', $transit->id) }}"><button class="btn btn-primary">Edit</button></a>
      @endcan
    </div>
  </div>
</div>
@endsection
