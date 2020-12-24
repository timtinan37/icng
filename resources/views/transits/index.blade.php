@extends('layout')

@section('title', 'Transits')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Transits</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Transits</div>
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
          @foreach ($transits as $transit)
            <tr>
              <td><a href="{{ route('transits.show', $transit->id) }}">{{ $transit->id }}</a></td>
              <td>{{ $transit->name }}</td>
              <td>{{ $transit->created_at }}</td>
              <td>{{ $transit->updated_at }}</td>
              <td>
                @can('update transits')
                  <a href="{{ route('transits.edit', $transit->id) }}">Edit</a><br>
                @endcan
                @can('delete transits')
                  <a href="#" class="text-danger" type="button" data-toggle="modal" data-target="#dangerModal{{ $transit->id }}">Delete</a>

                  <div class="modal fade" id="dangerModal{{ $transit->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCoverNote" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Warning</h4>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <p>This action will delete transit {{ $transit->id }}. Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="{{ route('transits.destroy', $transit->id) }}">
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
      {{ $transits->links() }}
    </div>
  </div>
</div>
@endsection
