<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Invoice',
            'id' => $this->id,
            'attributes' => [
                'customerName' => $this->customer_name,
                'amount' => $this->amount,
                'status' => $this->status,
                'paidDate' => $this->when(
                    $request->routeIs('invoices.show'),
                    $this->paid_date
                ),
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at
            ],
            'relationships' => [
                'author' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->user_id
                    ],
                    'links' => [
                        'self' => route('authors.show', ['author' => $this->user_id])

                    ]
                ]
            ],
            'includes' => new UserResource($this->whenLoaded('author')),

            'links' => [
                'self' => route('invoices.show', ['invoice' => $this->id])
            ]
        ];
    }
}
