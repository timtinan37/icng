<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Create extends Component
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
        return view('livewire.users.create');
    }
}
