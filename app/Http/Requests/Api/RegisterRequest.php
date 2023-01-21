<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191|min:3',
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('customers', 'email')->ignore($this->route('id'))
            ],
            'balance' => [
                'required',
                'numeric',
                'min:0'
            ],
            'password' => [
                'required',
                'min:6',
                'confirmed',
                'max:191',

            ],
        ];
    }
}
