<?php

namespace App\Http\Livewire\Branches;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class Edit extends Component
{
	public $branch, $name, $email, $address, $phone_number, $fax_number;

	public function mount()
	{
		$this->fill([
			'name' => $this->branch->name,
			'email' => $this->branch->email,
			'address' => $this->branch->address,
			'phone_number' => $this->branch->phone_number,
			'fax_number' => $this->branch->fax_number
		]);
	}

	protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('branches')->ignore($this->branch)],
            'address' => ['required', 'string', 'min:10'],
            'phone_number' => ['required', 'string', 'max:20', Rule::unique('branches')->ignore($this->branch)],
            'fax_number' => ['required', 'string', 'max:20',  Rule::unique('branches')->ignore($this->branch)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('branches')->ignore($this->branch)]
        ];
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.branches.edit');
    }
}
