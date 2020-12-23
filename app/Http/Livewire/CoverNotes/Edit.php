<?php

namespace App\Http\Livewire\CoverNotes;

use Livewire\Component;

class Edit extends Component
{
    public $coverNote;
    public $branches;
    public $carriages;
    public $risks;
    public $transits;
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
            'insured_bank_address' => ['required', 'string', 'min:10', 'max:255'],
            'insured_bank_account_name' => ['required', 'string', 'max:255'],
            'insured_address' => ['required', 'string', 'min:10', 'max:255'],
            'interest_covered' => ['required', 'string', 'min:10'],
            'voyage_from' => ['required', 'string', 'min:10', 'max:255'],
            'voyage_to' => ['required', 'string', 'min:10', 'max:255'],
            'voyage_via' => ['required', 'string', 'min:10', 'max:255'],
            'amount_insured_usd' => ['required', 'numeric'],
            'amount_insured_tolerance' => ['required', 'numeric'],
            'usd_to_bdt_rate' => ['required', 'numeric'],
            'mr_no' => ['required', 'numeric'],
            'vat_rate' => ['required', 'numeric'],
            'stamp_duty_bdt' => ['required', 'numeric'],
        ];
    }

    public function mount()
	{
		$this->fill([
            'insured_bank_address' => $this->coverNote->insured_bank_address,
            'insured_bank_account_name' => $this->coverNote->insured_bank_account_name,
            'insured_address' => $this->coverNote->insured_address,
            'interest_covered' => $this->coverNote->interest_covered,
            'voyage_from' => $this->coverNote->voyage_from,
            'voyage_to' => $this->coverNote->voyage_to,
            'voyage_via' => $this->coverNote->voyage_via,
            'amount_insured_usd' => $this->coverNote->amount_insured_usd,
            'amount_insured_tolerance' => $this->coverNote->amount_insured_tolerance,
            'usd_to_bdt_rate' => $this->coverNote->usd_to_bdt_rate,
            'mr_no' => $this->coverNote->mr_no,
            'vat_rate' => $this->coverNote->vat_rate,
            'stamp_duty_bdt' => $this->coverNote->stamp_duty_bdt
		]);
	}

    public function render()
    {
        return view('livewire.cover-notes.edit');
    }
}
