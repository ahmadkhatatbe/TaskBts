<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',

            // Add more validation rules for each field
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'image.required' => 'The image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be of type: jpeg, png, jpg, gif.',
            'image.dimensions' => 'The image must have a minimum width and height of 100 pixels.',

            // Add more custom messages for each field
        ];
    }
}
