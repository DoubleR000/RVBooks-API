<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Intervention\Validation\Rules\Isbn;

class UpdateTitleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'isbn' => ['nullable', new Isbn()],
            'title' => 'string|required',
            'description' => 'string|max:255|nullable',
            'publication_year' => 'date_format:Y|nullable',
            'publisher' => 'string|nullable'
        ];
    }
}
