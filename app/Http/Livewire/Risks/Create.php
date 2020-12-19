<?php

namespace App\Http\Livewire\Risks;

use Livewire\Component;

class Create extends Component
{
    public $name;
	public $tariff;

	protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255','unique:risks'],
            'tariff' => ['required', 'numeric'],
        ];
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.risks.create');
    }
}
