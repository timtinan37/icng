<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class BranchRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255', Route::current() == route('branches.create') ? 'unique:branches' : Rule::unique('branches')->ignore(request()->route('branch'))],
            'address' => ['required', 'string', 'min:10'],
            'phone_number' => ['required', 'string', 'max:20', Route::current() == route('branches.create') ? 'unique:branches' : Rule::unique('branches')->ignore(request()->route('branch'))],
            'fax_number' => ['required', 'string', 'max:20',  Route::current() == route('branches.create') ? 'unique:branches' : Rule::unique('branches')->ignore(request()->route('branch'))],
            'email' => ['required', 'string', 'email', 'max:255', Route::current() == route('branches.create') ? 'unique:branches' : Rule::unique('branches')->ignore(request()->route('branch'))]
        ];
    }
}
