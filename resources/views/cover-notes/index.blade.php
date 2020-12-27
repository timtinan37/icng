@extends('layout')

@section('title', 'Cover Notes')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item active">Cover Notes</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Cover Notes</div>
    <div class="card-body">
      <table class="table table-responsive-sm table-bordered table-striped table-sm">
        <thead>
          <tr>
            <th>ID</th>
            <th>Insured Bank Acc. Name & Address</th>
            <th>Amount Insured (Tk)</th>
            <th>Period</th>
            <th>Total Premium (Tk)</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($coverNotes as $coverNote)
            <tr>
              <td><a href="{{ route('cover-notes.show', $coverNote->id) }}">{{ $coverNote->id }}</a></td>
              <td>
                <b>{{ $coverNote->insured_bank_account_name }}</b><br>
                {{ $coverNote->insured_address }}
              </td>
              <td>{{ $coverNote->amount_insured_bdt }}</td>
              <td>{{ $coverNote->period_starts }} to {{ $coverNote->period_ends }}</td>
              <td>{{ $coverNote->total_premium_bdt }}</td>
              <td>{{ $coverNote->created_at }}</td>
              <td>{{ $coverNote->updated_at }}</td>
              <td class="text-center">
                <form method="post" action="{{ route('cover-notes.download', $coverNote->id) }}">
                  @csrf
                  <input type="hidden" name="fileType" value="docx">
                  <button type="submit" class="btn btn-link">Download</button>
                </form>
                @can('update cover notes')
                  <a href="{{ route('cover-notes.edit', $coverNote->id) }}">Edit</a><br>
                @endcan
                @can('delete cover notes')
                  <a href="#" class="text-danger" type="button" data-toggle="modal" data-target="#dangerModal{{ $coverNote->id }}">Delete</a>

                  <div class="modal fade" id="dangerModal{{ $coverNote->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCoverNote" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Warning</h4>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <p>This action will delete cover note {{ $coverNote->id }}. Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="{{ route('cover-notes.destroy', $coverNote->id) }}">
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
      {{ $coverNotes->links() }}
    </div>
  </div>
</div>
@endsection
