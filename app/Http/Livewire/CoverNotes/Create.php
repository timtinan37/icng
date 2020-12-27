<?php

namespace App\Http\Livewire\CoverNotes;

use Livewire\Component;

class Create extends Component
{
    public $branches;
    public $risks;
    public $transits;
    public $issuing_office;
    public $insured_bank_name;
	public $insured_bank_address;
	public $insured_bank_account_name;
	public $insured_address;
	public $interest_covered;
	public $voyage_from;
	public $voyage_to;
	public $voyage_via;
	public $amount_insured_usd;
	public $amount_insured_tolerance;
	public $usd_to_bdt_rate;
	public $mr_no;
	public $vat_rate;
	public $stamp_duty_bdt;

    protected function rules()
    {
        return [
            'issuing_office' => ['required', 'string'],
            'insured_bank_name' => ['required', 'string', 'min:2', 'max:255'],
            'insured_bank_address' => ['required', 'string', 'min:10', 'max:255'],
            'insured_bank_account_name' => ['required', 'string', 'max:255'],
            'insured_address' => ['required', 'string', 'min:10', 'max:255'],
            'interest_covered' => ['required', 'string', 'min:10'],
            'voyage_from' => ['required', 'string', 'min:2', 'max:255'],
            'voyage_to' => ['required', 'string', 'min:2', 'max:255'],
            'voyage_via' => ['required', 'string', 'min:2', 'max:255'],
            'amount_insured_usd' => ['required', 'numeric'],
            'amount_insured_tolerance' => ['required', 'numeric'],
            'usd_to_bdt_rate' => ['required', 'numeric'],
            'mr_no' => ['required', 'numeric'],
            'vat_rate' => ['required', 'numeric'],
            'stamp_duty_bdt' => ['required', 'numeric'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.cover-notes.create');
    }
}
