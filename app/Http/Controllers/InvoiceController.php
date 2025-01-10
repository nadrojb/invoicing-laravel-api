<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\JsonResponse;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        //I swapped all for paginate so it shows 15 invoices per page
        $invoices = Invoice::all()?->makeHidden(['created_at', 'updated_at']);
        if (!$invoices) {
            return response()->json([
                'message' => 'No data found',
            ], 404);
        } else return response()->json([
            'message' => 'Invoices successfully fetched',
            'data' => $invoices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice): JsonResponse
    {
        $invoice = $invoice->makeHidden(['created_at', 'updated_at']);
        if (!$invoice) {
            return response()->json([
                'message' => 'No data found',
            ], 404);
        } else return response()->json([
            'message' => 'Invoice successfully fetched',
            'data' => $invoice
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
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
