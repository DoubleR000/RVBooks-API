<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
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
            'book_id' => 'integer|required|exists:loans',
            'user_id' => 'integer|required|exists:users',
            'return_date' => 'date_format:Y-m-d H:i:s|nullable|after:due_date',
            'due_date' => 'date:format:Y-m-d H:i:s|after:today|required',
            'returned_by_staff' => 'integer|nullable|exists:users'
        ];
    }
}
