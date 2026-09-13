<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class agentRegisterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
    {
        return [
            'name' => ['bail', 'required',  'min:2','max:100'],
            'phone' => ['bail', 'required', 'string', 'min:2','max:100'],
            'email' => ['bail', 'required', 'string','email', 'lowercase', 'min:2','max:100', 'unique:users,email'],
            'password' => ['bail', 'required', 'string','min:8','confirmed'],
            'password_confirmation'=> ['bail', 'required', 'string', 'min:8'],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' =>'Please enter your :attribute',
            'name.min' =>'Two characters is NOT allowed ',
            'name.max' =>'Maximum characters allowed is 100',
            'phone.required' =>'Please enter :attribute',
            'password.required' => 'Please enter your :attribute',
            'password.min' => ':attribute must be aleast 8 minimum characters',
            'password_confirmation.confirmed' =>':attribute must match password' 
        ];
    }

    
    public function attributes()
    {
        return [
            'name' => 'Company Name',
            'phone' => 'Company Phone or WhatsApp must be number',
            'email' => 'Company Email',
            'password' => 'Password',
            'password_confirmation' => 'Confirmation Password',
        ];
    }
}
