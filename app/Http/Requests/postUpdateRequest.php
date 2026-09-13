<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class postUpdateRequest extends FormRequest
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
            'title'                => ['required', 'string', 'max:100'],
            'job_type'             => ['required'],
            'experince_level'      => ['required'],
            'salary'               => ['required', 'numeric',],
            'location'             => ['required',  'string', 'max:100'],
            'vacancy'              => ['required'],
            'gender'              => ['required'],
            'category_id'          => ['required', 'exists:categories,id'],
            'application_deadline' => ['required', 'date'],
            'feature_image'        => ['image', 'mimes:png,jpg,jpeg'],
            'description'          => ['required', 'string', 'max:5000'],
            'responsibilities'     => ['required', 'string', 'max:5000'],
            'requirement'          => ['required', 'string', 'max:5000'],
        ];
    }
}
