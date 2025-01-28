<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\InvoiceFilter;
use App\Http\Requests\Api\V1\StoreInvoiceRequest;
use App\Http\Resources\V1\InvoiceResource;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorsInvoicesController extends Controller
{
    public function index($author_id, InvoiceFilter $filter)
    {
        return InvoiceResource::collection(Invoice::where('user_id', $author_id)->filter($filter)->paginate());
    }

    public function store($author_id, StoreInvoiceRequest $request)
    {

        $model = [
            'customer_name' => $request->input('data.attributes.customerName'),
            'amount' => $request->input('data.attributes.amount'),
            'status' => $request->input('data.attributes.status'),
            'user_id' => $author_id
        ];

        return new InvoiceResource(Invoice::create($model));
    }
}
