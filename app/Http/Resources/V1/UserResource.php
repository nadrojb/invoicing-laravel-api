<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'user',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                // mergeWhen to conditionally opt in attributes
                $this->mergeWhen($request->routeIs('users.*'), [
                    'emailVerifiedAt' => $this->email_verified_at,
                    'createdAt' => $this->created_at,
                    'updatedAt' => $this->updated_at,
                ]),
            ],
            'includes' => InvoiceResource::collection($this->whenLoaded('invoices')),
            'links' => [
                'self' => route('users.show', ['user' => $this->id]),
            ],
        ];
    }
}