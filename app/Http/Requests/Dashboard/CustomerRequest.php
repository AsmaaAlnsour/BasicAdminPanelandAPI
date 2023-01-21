<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

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
               'nullable',
               'min:6',
               'confirmed',
               'max:191',
               Rule::requiredIf(function() {
                   return Request::routeIs('customers.store');
               })
           ],
        ];


   }

}
