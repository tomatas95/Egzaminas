<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function messages()
    {
        return[
            'name' => __("Name is required."),
            'surname.required' => __("Surname is required."),
            'name.min' => __("The name must be at least :min characters."),
            'name.max' => __("The name must not be greater than :max characters."),
            'surname.min' => __("The surname must be at least :min characters."),
            'surname.max' => __("The surname must not be greater than :max characters."),
            'name.regex' => __("Name must contain only alphabetic characters."),
            'surname.regex' => __("Surname must contain only alphabetic characters.")
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:64|regex:/^[a-zA-Z\s]+$/',
            'surname' => 'required|min:3|max:64|regex:/^[a-zA-Z\s]+$/',
            ];
    }
}
