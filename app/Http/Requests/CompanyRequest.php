<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'type' => ['required'],
            'uuid' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
