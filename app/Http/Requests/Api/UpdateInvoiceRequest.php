<?php

namespace App\Http\Requests\Api;

class UpdateInvoiceRequest extends BaseInvoiceRequest
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
        $rules = [
            'data.attributes.customerName' => 'sometimes|string',
            'data.attributes.amount' => 'sometimes|int',
            'data.attributes.status' => 'sometimes|string|in:B,P,X',
            'data.relationships.author.data.id' => 'sometimes|int'
        ];
        return $rules;
    }
}
