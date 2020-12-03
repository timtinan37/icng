<?php

namespace App\Http\Livewire\Branches;

use Livewire\Component;

class Create extends Component
{
	public $name, $email, $address, $phone_number, $fax_number;

	protected function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255|unique:branches',
            'address' => 'required|string|min:10',
            'phone_number' => 'required|string|max:20|unique:branches',
            'fax_number' => 'required|string|max:20|unique:branches',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:branches']
        ];
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.branches.create');
    }
}