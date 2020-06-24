<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormValidation extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|email|max:35'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This name field is required',
            'name.max' => 'Maximum is 20 characters',
            'email.required' => 'This email field is required'
        ];
    }
}
