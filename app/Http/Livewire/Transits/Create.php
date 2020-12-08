<?php

namespace App\Http\Livewire\Transits;

use Livewire\Component;

class Create extends Component
{
	public $name;

	protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255','unique:transits']
        ];
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.transits.create');
    }
}
