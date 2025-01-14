<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreInvoiceRequest;
use App\Http\Requests\Api\V1\UpdateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            'status' => 'nullable|in:B,P,V'
        ]);

    $query = Invoice::query();

    if($request->has('status')) {
        $query->where('status', $request->get('status'));
        return response()->json([
            'message' => 'Invoices successfully fetched',
            'data' => $query->get()?->makeHidden(['created_at', 'updated_at'])
        ], 200);
    } else if (!$request->has('status')) {
        return response()->json([
            'message' => 'Invoices successfully fetched',
            'data' => Invoice::all()?->makeHidden(['created_at', 'updated_at'])
        ], 200);
    }  else {
        return response()->json([
            'message' => 'No data found',
        ], 404);
    }
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
