<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BaseInvoiceRequest extends FormRequest
{

    public function mappedAttributes()
    {
        $attributeMap = [
            'data.attributes.customerName' => 'customer_name',
            'data.attributes.amount' => 'amount',
            'data.attributes.status' => 'status',
            'data.attributes.createdAt' => 'created_at',
            'data.attributes.updatedAt' => 'updated_at',

            'data.relationships.author.data.id' => 'user_id'
        ];
        $attributesToUpdate = [];

        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $attributesToUpdate[$attribute] = $this->input($key);
            }
        }
        return $attributesToUpdate;
    }

    public function messages()
    {
        return [
            'data.attributes.status' => 'The data.attributes.status value is invalid. Please use B, P or X'
        ];
    }
}
