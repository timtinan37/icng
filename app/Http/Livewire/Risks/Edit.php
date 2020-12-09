<?php

namespace App\Http\Livewire\Risks;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
	public $risk, $name;

	public function mount()
	{
		$this->fill([
			'name' => $this->risk->name,
		]);
	}

	protected function rules()
	{
		return [
        	'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('risks')->ignore($this->risk)]
        ];
	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

    public function render()
    {
        return view('livewire.risks.edit');
    }
}
