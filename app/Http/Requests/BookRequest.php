<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // You can set this to true if authorization is not required for this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:1|max:255',
            'pages' => 'required|integer|min:1|max:99999',
            'isbn' => ['required', 'min:1', 'max:64', 'regex:/^\d{10,13}$/'],
            'short_desc' => 'required',
            'author_id' => 'required|exists:authors,id',
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => __("Title is required."),
            'title.min' => __("Book's Title must be at least :min characters."),
            'title.max' => __("Book's Title must not be greater than :max characters."),
            'pages.required' => __("Book's Page Amount is required."),
            'pages.integer' => __("Pages must be an integer value."),
            'pages.min' => __("Page Amount must be at least :min."),
            'pages.max' => __("Page Amount must not exceed :max."),
            'isbn.required' => __("Book's ISBN Code is required."),
            'isbn.min' => __("ISBN Code must be at least :min characters."),
            'isbn.max' => __("ISBN Code must not exceed :max characters."),
            'short_desc.required' => __("Short Description about the Book is required."),
            'author_id.required' => __("Author is required."),
            'author_id.exists' => __("Selected author does not exist."),
            'isbn.regex' => __("Invalid ISBN Code. It should be a numeric value with 10 to 13 digits."),

        ];
    }
}
