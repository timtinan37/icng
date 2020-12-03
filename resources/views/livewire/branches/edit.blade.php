<form class="form-horizontal" action="{{ route('branches.update', $branch->id) }}" method="post">
  @method('PATCH')
  @csrf
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="name">Name</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="name" id="name" type="text" name="name" placeholder="name of the branch">
      @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="email">Email</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="email" id="email" type="email" name="email" placeholder="something@example.com" autocomplete="email">
      @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="phone_number">Phone Number</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="phone_number" id="phone_number" type="text" name="phone_number" placeholder="phone no. of the branch">
      @error('phone_number') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="fax_number">Fax Number</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="fax_number" id="fax_number" type="text" name="fax_number" placeholder="fax no. of the branch">
      @error('fax_number') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="address">Address</label>
    <div class="col-md-9">
      <textarea class="form-control" wire:model="address" id="address" name="address" rows="9" placeholder="address of the branch"></textarea>
      @error('address') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="card-footer">
    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
  </div>
</form>