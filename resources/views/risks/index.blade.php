@extends('layout')

@section('title', 'Risks')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Risks</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Risks</div>
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
          @foreach ($risks as $risk)
            <tr>
              <td><a href="{{ route('risks.show', $risk->id) }}">{{ $risk->id }}</a></td>
              <td>{{ $risk->name }}</td>
              <td>{{ $risk->created_at }}</td>
              <td>{{ $risk->updated_at }}</td>
              <td>
                @can('update risks')
                  <a href="{{ route('risks.edit', $risk->id) }}">Edit</a><br>
                @endcan
                @can('delete risks')
                  <a href="#" class="text-danger" type="button" data-toggle="modal" data-target="#dangerModal{{ $risk->id }}">Delete</a>

                  <div class="modal fade" id="dangerModal{{ $risk->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCoverNote" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Warning</h4>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <p>This action will delete risk {{ $risk->id }}. Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="{{ route('risks.destroy', $risk->id) }}">
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
      {{ $risks->links() }}
    </div>
  </div>
</div>
@endsection
