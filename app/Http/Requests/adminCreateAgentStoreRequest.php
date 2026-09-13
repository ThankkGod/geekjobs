<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class adminCreateAgentStoreRequest extends FormRequest
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
              'name' => ['bail', 'required', 'string', 'max:100'],
            'email' => ['bail', 'required', 'string','email','lowercase', 'max:100', 'unique:users,email'],
            // 'password' => ['bail', 'required', 'string','min:8','confirmed'],
            // 'password_confirmation' => ['bail', 'required', 'string','min:8'],
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'name.required' => 'Please enter :attribute',
            'email.required' => 'Please enter :attribute',
        ];
    }

    #[Override]
    public function attributes()
    {
        return [
            'name' => 'Company Name',
            'email' => 'Company Email',
        ];
    }
}
