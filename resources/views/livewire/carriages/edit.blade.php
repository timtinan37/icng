<form class="form-horizontal" action="{{ route('carriages.update', $carriage->id) }}" method="post">
  @method('PATCH')
  @csrf
  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="name">Name</label>
    <div class="col-md-9">
      <input class="form-control" wire:model="name" id="name" type="text" name="name" placeholder="name of the carriage">
      @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="card-footer">
    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
  </div>
</form>