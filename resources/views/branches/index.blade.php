@extends('layout')

@section('title', 'Branches')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Branches</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Branches</div>
    <div class="card-body">
      <table class="table table-responsive-sm table-bordered table-striped table-sm">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($branches as $branch)
            <tr>
              <td><a href="{{ route('branches.show', $branch->id) }}">{{ $branch->id }}</a></td>
              <td>{{ $branch->name }}</td>
              <td>{{ $branch->phone_number }}</td>
              <td>{{ $branch->email }}</td>
              <td>{{ $branch->created_at }}</td>
              <td>{{ $branch->updated_at }}</td>
              <td>
                @can('update branches')
                  <a href="{{ route('branches.edit', $branch->id) }}">Edit</a><br>
                @endcan
                @can('delete branches')
                  <a href="#" class="text-danger" type="button" data-toggle="modal" data-target="#dangerModal{{ $branch->id }}">Delete</a>

                  <div class="modal fade" id="dangerModal{{ $branch->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCoverNote" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Warning</h4>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <p>This action will delete branch {{ $branch->id }}. Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="{{ route('branches.destroy', $branch->id) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-danger" type="submit">Yes, Delete!</button>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content-->
                    </div>
                    <!-- /.modal-dialog-->
                  </div>
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $branches->links() }}
    </div>
  </div>
</div>
@endsection
