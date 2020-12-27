<form class="form-horizontal" action="{{ route('cover-notes.update', $coverNote->id) }}" method="post">
  @method('patch')
  @csrf
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="issuing_office_id">Issuing Office</label>
    <div class="col-md-9">
      <select class="form-control" id="issuing_office_id" name="issuing_office_id" autocomplete="off">
      	@foreach ($branches as $branch)
      		<option value="{{ $branch->id }}" @if ($branch->id == $coverNote->branch->id) "selected" @endif>{{ $branch->name }}</option>
      	@endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="insured_bank_name">Insured Bank Name</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="insured_bank_name" id="insured_bank_name" name="insured_bank_name" type="text" placeholder="name of the insured bank">
      @error('insured_bank_name') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="insured_bank_address">Insured Bank Address</label>
    <div class="col-md-9">
      <textarea class="form-control" wire:model="insured_bank_address" id="insured_bank_address" name="insured_bank_address" rows="9" placeholder="address of the insured bank"></textarea>
      @error('insured_bank_address') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="insured_bank_account_name">Insured Bank Account Name</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="insured_bank_account_name" id="insured_bank_account_name" name="insured_bank_account_name" type="text" placeholder="name of the insured bank account">
      @error('insured_bank_account_name') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="insured_address">Insured Address</label>
    <div class="col-md-9">
      <textarea class="form-control" wire:model="insured_address" id="insured_address" name="insured_address" rows="9" placeholder="address of the insured"></textarea>
      @error('insured_address') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="interest_covered">Interest Covered</label>
    <div class="col-md-9">
      <textarea class="form-control" wire:model="interest_covered" id="interest_covered" name="interest_covered" type="text"></textarea>
      @error('interest_covered') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="voyage_from">Voyage From</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="voyage_from" id="voyage_from" type="text" name="voyage_from">
      @error('voyage_from') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="voyage_to">Voyage To</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="voyage_to" id="voyage_to" type="text" name="voyage_to">
      @error('voyage_to') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="voyage_via">Voyage Via</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="voyage_via" id="voyage_via" type="text" name="voyage_via">
      @error('voyage_via') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div id="transportation">
    <transportation v-on:init-transits="initTransits({{ $coverNote->transits->pluck('id') }})"></transportation>
    <div class="form-group row">
      <label class="col-md-3 col-form-label">Transits</label>
      <div class="col-md-9 col-form-label">
        @foreach ($transits as $transit)
          <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="{{ $transit->id }}" name="transit{{ $transit->id }}" type="checkbox" value="{{ $transit->id }}" v-model="checkedTransits">
            <label class="form-check-label" for="{{ $transit->id }}">{{ $transit->name }}</label>
          </div>
        @endforeach
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 col-form-label" for="carriage_id">Carriage</label>
      <div class="col-md-9">
        <select class="form-control" id="carriage_id" name="carriage_id" autocomplete="off">
          <option v-for="(carriageOption, index) in carriageOptions" :id="carriageOption.id+'carriage'" :key="index+10" v-bind:value="carriageOption.id">
            @{{ carriageOption.name }}
          </option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label">Risks</label>
    <div class="col-md-9 col-form-label">
      @foreach($risks as $risk)
        <div class="form-check form-check-inline mr-1">
          <input class="form-check-input" id="{{ $risk->id }}" name="risk{{ $risk->id }}" type="checkbox" @if ($coverNote->risks->contains($risk->id)) checked @endif value="{{ $risk->id }}">
          <label class="form-check-label" for="{{ $risk->id }}">{{ $risk->name }}</label>
        </div>
      @endforeach
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="amount_insured_usd">Amount Insured (USD)</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="amount_insured_usd" id="amount_insured_usd" type="text" name="amount_insured_usd">
      @error('amount_insured_usd') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="amount_insured_tolerance">Amount Insured Tolerance (%)</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="amount_insured_tolerance" id="amount_insured_tolerance" type="text" name="amount_insured_tolerance">
      @error('amount_insured_tolerance') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="usd_to_bdt_rate">USD-BDT Coversion Rate</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="usd_to_bdt_rate" id="usd_to_bdt_rate" type="text" name="usd_to_bdt_rate" placeholder="enter equivalent amount of 1$ in tk">
      @error('usd_to_bdt_rate') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="period_starts">Period Starts</label>
    <div class="col-md-9">
      <input class="form-control" id="period_starts" type="date" name="period_starts" value="{{ $coverNote->period_starts }}">
      @error('period_starts') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="period_ends">Period Ends</label>
    <div class="col-md-9">
      <input class="form-control" id="period_ends" type="date" name="period_ends" value="{{ $coverNote->period_ends }}">
      @error('period_ends') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="mr_no">Money Receipt No.</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="mr_no" id="mr_no" type="text" name="mr_no">
      @error('mr_no') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="vat_rate">Vat Rate (BDT) (%)</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="vat_rate" id="vat_rate" type="text" name="vat_rate">
      @error('vat_rate') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="stamp_duty_bdt">Stamp Duty (BDT)</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="stamp_duty_bdt" id="stamp_duty_bdt" type="text" name="stamp_duty_bdt">
      @error('stamp_duty_bdt') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="card-footer">
    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
  </div>
</form>