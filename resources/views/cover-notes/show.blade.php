@extends('layout')

@section('title', "Cover Note - $coverNote->id")

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Cover Notes</li>
  <li class="breadcrumb-item active">{{ $coverNote->id }}</li>
</ol>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Cover Note Details</div>
    <div class="card-body">
      <table class="table table-responsive table-borderless">
        <tbody>
          <tr>
            <th scope="row" colspan="4">Id</th>
            <td>{{ $coverNote->id }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Issuing Office</th>
            <td>{{ $coverNote->branch->name }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Insured Bank name</th>
            <td>{{ $coverNote->insured_bank_name }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Insured Bank Address</th>
            <td>{{ $coverNote->insured_bank_address }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Insured Bank Account Name</th>
            <td>{{ $coverNote->insured_bank_account_name }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Insured Address</th>
            <td>{{ $coverNote->insured_address }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Interest Covered</th>
            <td>{{ $coverNote->interest_covered }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Voyage From</th>
            <td>{{ $coverNote->voyage_from }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Voyage To</th>
            <td>{{ $coverNote->voyage_to }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Voyage Via</th>
            <td>{{ $coverNote->voyage_via }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Transits</th>
            <td>
              <ol>
                @foreach ($coverNote->transits as $transit)
                  <li>{{ $transit->name }}</li>
                @endforeach
              </ol>
            </td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Carriage</th>
            <td>{{ $coverNote->carriage->name }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Amount Insured USD</th>
            <td>{{ $coverNote->amount_insured_usd }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Amount Insured Tolerance (%)</th>
            <td>{{ $coverNote->amount_insured_tolerance }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">USD to BDT Rate (Tk)</th>
            <td>{{ $coverNote->usd_to_bdt_rate }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Amount Insured BDT</th>
            <td>{{ $coverNote->amount_insured_bdt }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Period Starts</th>
            <td>{{ $coverNote->period_starts }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Period Ends</th>
            <td>{{ $coverNote->period_ends }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Money Receipt No.</th>
            <td>{{ $coverNote->mr_no }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Risks</th>
            <td>
              <ol>
                @foreach ($coverNote->risks as $risk)
                  <li>{{ $risk->name }} ({{ $risk->tariff }})</li>
                @endforeach
              </ol>
            </td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Tariff</th>
            <td>{{ $coverNote->tariff }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Net Premium BDT</th>
            <td>{{ $coverNote->net_premium_bdt }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Vat Rate (%)</th>
            <td>{{ $coverNote->vat_rate }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Vat Amount BDT</th>
            <td>{{ $coverNote->vat_amount_bdt }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Stamp Duty</th>
            <td>{{ $coverNote->stamp_duty_bdt }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Total Premium BDT</th>
            <td>{{ $coverNote->total_premium_bdt }}</td>
          </tr>
          <tr>
            <th scope="row" colspan="4">Issued By</th>
            <td>{{ $coverNote->issuer->name }}</td>
          </tr>
        </tbody>
      </table>
      <hr>

      @can('update cover notes')
        <a class="d-inline" href="{{ route('cover-notes.edit', $coverNote->id) }}"><button class="btn btn-primary">Edit</button></a>
      @endcan
      <form method="post" action="{{ route('cover-notes.download', $coverNote->id) }}" class="d-inline">
        @csrf
        <input type="hidden" name="fileType" value="docx">
        <button type="submit" class="btn btn-danger">Download Docx</button>
      </form>
    </div>
  </div>
</div>
@endsection
