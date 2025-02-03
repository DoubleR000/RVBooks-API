<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoanPriceRequest extends FormRequest
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
            'title_id' => 'string|exists:titles,id',
            'rental_period_unit_id' => 'int|exists:rental_period_units,id',
            'rental_period_amount' => 'int',
            'price' => 'decimal:2',
            'effective_from' => 'date_format:Y-m-d H:i:s'
        ];
    }
}
