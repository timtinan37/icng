<?php

namespace App\Http\Livewire\PolicyTypes;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
	public $policyType, $name, $unique_code;

	public function mount()
	{
		$this->fill([
			'name' => $this->policyType->name,
			'unique_code' => $this->policyType->unique_code
		]);
	}
	
	protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('policy_types')->ignore($this->policyType)],
            'unique_code' => ['required', 'string', 'min:2', 'max:255', Rule::unique('policy_types')->ignore($this->policyType)]
        ];
    }

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.policy-types.edit');
    }
}
