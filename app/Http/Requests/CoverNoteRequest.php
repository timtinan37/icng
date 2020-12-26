<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'issuing_office' => ['required', 'string'],
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
}
