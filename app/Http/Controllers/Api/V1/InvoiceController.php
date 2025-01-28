<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\InvoiceFilter;
use App\Http\Requests\Api\V1\StoreInvoiceRequest;
use App\Http\Requests\Api\V1\UpdateInvoiceRequest;
use App\Http\Resources\V1\InvoiceResource;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class InvoiceController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(InvoiceFilter $filters)
    {
        return InvoiceResource::collection(Invoice::filter($filters)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        try {
            $user = User::findOrFail($request->input('data.relationships.author.data.id'));
        } catch (ModelNotFoundException $exception) {
            return $this->ok('User not found', [
                'error' => 'The provided user id des not exist'
            ]);

        }
        $model = [
            'customer_name' => $request->input('data.attributes.customerName'),
            'amount' => $request->input('data.attributes.amount'),
            'status' => $request->input('data.attributes.status'),
            'user_id' => $request->input('data.relationships.author.data.id')
        ];

        return Invoice::create($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice): InvoiceResource
    {
        if ($this->include('author')) {
            return new InvoiceResource($invoice->load('user'));
        }


        return new InvoiceResource($invoice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
