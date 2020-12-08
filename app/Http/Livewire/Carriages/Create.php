<?php

namespace App\Http\Livewire\Carriages;

use Livewire\Component;

class Create extends Component
{
	public $name;

	protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255','unique:carriages']
        ];
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.carriages.create');
    }
}
