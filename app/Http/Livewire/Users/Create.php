<?php

namespace App\Http\Livewire\Users;

use App\Models\User;;
use Livewire\Component;

class Create extends Component
{
	public $name, $email, $password, $password_confirmation;

	protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required',
        ];
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);

        $propertyName == 'password_confirmation' ? $this->validateOnly('password') : null;
	}

    public function render()
    {
        return view('livewire.users.create');
    }
}
