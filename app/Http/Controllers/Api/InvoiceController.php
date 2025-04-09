<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\V1\InvoiceFilter;
use App\Http\Requests\Api\ReplaceInvoiceRequest;
use App\Http\Requests\Api\StoreInvoiceRequest;
use App\Http\Requests\Api\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceResource;
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
            $user = User::findOrFail($request->input('data.relationships.author.data'));
        } catch (ModelNotFoundException $exception) {
            return $this->ok('User not found', [
                'error' => 'The provided user id des not exist'
            ]);

        }

        return new InvoiceResource(Invoice::create($request->mappedAttributes()));
    }

    /**
     * Display the specified resource.
     */
    public function show($invoice_id)
    {
        try {
            $invoice = Invoice::findOrFail($invoice_id);
            if ($this->include('author')) {
                return new InvoiceResource($invoice->load('user'));
            }
            return new InvoiceResource($invoice);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Invoice cannot found', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, $invoice_id)
    {
        //PATCH
        try {
            $invoice = Invoice::findOrFail($invoice_id);

            $invoice->update($request->mappedAttributes());

            return new InvoiceResource($invoice);

        } catch (ModelNotFoundException $exception) {
            return $this->error('Invoice cannot found', 404);
        }
    }

    public function replace(ReplaceInvoiceRequest $request, $invoice_id)
    {
        //PUT
        try {
            $invoice = Invoice::findOrFail($invoice_id);

            $invoice->update($request->mappedAttributes());

            return new InvoiceResource($invoice);

        } catch (ModelNotFoundException $exception) {
            return $this->error('Invoice cannot found', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($invoice_id)
    {
        try {
            $invoice = Invoice::findOrFail($invoice_id);
            $invoice->delete();

            return $this->ok('Invoice successfully deleted');
        } catch (ModelNotFoundException $exception) {
            return $this->error('Invoice cannot be found', 404);
        }
    }
}
