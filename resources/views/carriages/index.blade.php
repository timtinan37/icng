@extends('layout')

@section('title', 'Carriages')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Carriages</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Carriages</div>
    <div class="card-body">
      <table class="table table-responsive-sm table-bordered table-striped table-sm">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($carriages as $carriage)
            <tr>
              <td><a href="{{ route('carriages.show', $carriage->id) }}">{{ $carriage->id }}</a></td>
              <td>{{ $carriage->name }}</td>
              <td>{{ $carriage->created_at }}</td>
              <td>{{ $carriage->updated_at }}</td>
              <td>
                @can('update carriages')
                  <a href="{{ route('carriages.edit', $carriage->id) }}">Edit</a><br>
                @endcan
                @can('delete carriages')
                  <a href="#" class="text-danger" type="button" data-toggle="modal" data-target="#dangerModal{{ $carriage->id }}">Delete</a>

                  <div class="modal fade" id="dangerModal{{ $carriage->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCoverNote" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Warning</h4>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <p>This action will delete carriage {{ $carriage->id }}. Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="{{ route('carriages.destroy', $carriage->id) }}">
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
      {{ $carriages->links() }}
    </div>
  </div>
</div>
@endsection
