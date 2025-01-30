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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'isbn' => ['nullable', 'unique:titles', new Isbn()],
            'title' => 'string',
            'description' => 'string|max:255|nullable',
            'publication_year' => 'date_format:Y|nullable',
            'publisher' => 'string|nullable',
            'author_ids' => 'array|nullable',
            'author_ids.*' => 'exists:authors,id',
            'genre_ids' => 'array|nullable',
            'genre_ids.*' => 'exists:genres,id'
        ];
    }
}
