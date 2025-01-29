<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends BaseInvoiceRequest
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
            'data.attributes.customerName' => 'required|string',
            'data.attributes.amount' => 'required|int',
            'data.attributes.status' => 'required|string|in:B,P,X',
        ];
        if ($this->routeIs('invoices.store')) {
            $rules['data.relationships.author.data.id'] = 'required|int';
        }
        return $rules;
    }

}
