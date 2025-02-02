<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanPriceRequest extends FormRequest
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
            'rental_period_unit_id' => 'int|required|exists:rental_period_units,id',
            'rental_period_amount' => 'int|required',
            'price' => 'decimal:2|required',
            'effective_from' => 'date_format:Y-m-d H:i:s'
        ];
    }
}
