<?php

namespace App\Http\Livewire\Carriages;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
	public $carriage, $name;

	public function mount()
	{
		$this->fill([
			'name' => $this->carriage->name,
		]);
	}

	protected function rules()
	{
		return [
        	'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('carriages')->ignore($this->carriage)]
        ];
	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.carriages.edit');
    }
}
