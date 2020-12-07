<?php

namespace App\Http\Livewire\PolicyTypes;

use Livewire\Component;

class Create extends Component
{
	public $name, $unique_code;

	protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255','unique:policy_types'],
            'unique_code' => ['required', 'string', 'min:2', 'max:255', 'unique:policy_types'],
        ];
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.policy-types.create');
    }
}
