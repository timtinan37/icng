<?php

namespace App\Http\Livewire\Users;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
	public $user, $name, $email, $password, $password_confirmation;

	public function mount()
	{
		$this->fill([
			'name' => $this->user->name,
			'email' => $this->user->email
		]);
	}

	protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
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
        return view('livewire.users.edit');
    }
}
