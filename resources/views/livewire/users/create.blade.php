<form class="form-horizontal" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="name">Name</label>
    <div class="col-md-9">
      <input class="form-control" wire:model.lazy="name" id="name" type="text" name="name"placeholder="name of the user">
      @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="email">Email</label>
    <div class="col-md-9">
      <input class="form-control" wire:model.lazy="email" id="email" type="email" name="email"placeholder="something@example.com" autocomplete="email">
      @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="password">Password</label>
    <div class="col-md-9">
      <input class="form-control" wire:model.lazy="password" id="password" type="password" name="password" placeholder="min. 8 characters">
      @error('password') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="password_confirmation">Confirm Password</label>
    <div class="col-md-9">
      <input class="form-control" wire:model.lazy="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" placeholder="retype password">
      @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="card-footer">
    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
  </div>
</form>