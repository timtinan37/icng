<form class="form-horizontal" action="{{ route('policy-types.store') }}" method="post">
  @csrf
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="name">Name</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="name" id="name" type="text" name="name" placeholder="name of the policy type">
      @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="name">Unique Code</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="unique_code" id="unique_code" type="text" name="unique_code" placeholder="unique code of the policy type">
      @error('unique_code') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="card-footer">
    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
  </div>
</form>