<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class PolicyTypeRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255', Route::current() == route('policy-types.create') ? 'unique:policy_types' : Rule::unique('policy_types')->ignore(request()->route('policyType'))],
            'unique_code' => ['required', 'string', 'min:2', 'max:255', Route::current() == route('policy-types.create') ? 'unique:policy_types' : Rule::unique('policy_types')->ignore(request()->route('policyType'))],
        ];
    }
}
