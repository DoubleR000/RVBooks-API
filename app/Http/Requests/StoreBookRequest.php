<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title_id' => 'string|required|exists:titles,id',
            'location_id' => 'int|required|exists:locations,id',
            'book_status_id' => 'int|required|exists:book_statuses,id',
            'book_condition_id' => 'int|required|exists:book_conditions,id',
            'acquisition_date' => 'date_format:Y-m-d H:i:s'
        ];
    }
}
