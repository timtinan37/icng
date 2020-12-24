@extends('layout')

@section('title', 'Users')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Users</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Users</div>
    <div class="card-body">
      <table class="table table-responsive-sm table-bordered table-striped table-sm">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td><a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a></td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->created_at }}</td>
              <td>{{ $user->updated_at }}</td>
              <td>
                @can('update users')
                  <a href="{{ route('users.edit', $user->id) }}">Edit</a><br>
                  <a href="{{ route('users.showPermissions', $user->id) }}">Permission Settings</a><br>
                @endcan
                @can('delete users')
                  <a href="#" class="text-danger" type="button" data-toggle="modal" data-target="#dangerModal{{ $user->id }}">Delete</a>

                  <div class="modal fade" id="dangerModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCoverNote" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Warning</h4>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <p>This action will delete user {{ $user->id }}. Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="{{ route('users.destroy', $user->id) }}">
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
      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection
