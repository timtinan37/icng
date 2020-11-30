<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserForm extends Component
{
	public $name, $email, $password, $password_confirmation;

	protected function rules()
    {
        return User::rules();
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);

        $propertyName == 'password_confirmation' ? $this->validateOnly('password') : null;
	}

    public function render()
    {
        return view('livewire.user-form');
    }
}
