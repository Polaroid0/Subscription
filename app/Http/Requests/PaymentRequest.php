<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'card_holder_name' => [
                'required',
                'string',
                'max:255',
            ],
            'card_number' => [
                'required',
                'string',
                'max:255',
            ],
            'card_exp' => [
                'required',
                'string',
                'min:4',
                'max:255',
            ],
            'card_cvv' => [
                'required',
                'string',
                'min:3',
                'max:3',
            ],
        ];
    }
}
