<?php

namespace App\Http\Livewire\Transits;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
	public $transit, $name;

	public function mount()
	{
		$this->fill([
			'name' => $this->transit->name,
		]);
	}

	protected function rules()
	{
        return [
        	'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('transits')->ignore($this->transit)]
        ];
	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.transits.edit');
    }
}
