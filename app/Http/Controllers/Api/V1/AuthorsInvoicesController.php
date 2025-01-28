<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\InvoiceFilter;
use App\Http\Resources\V1\InvoiceResource;
use App\Models\Invoice;

class AuthorsInvoicesController extends Controller
{
    public function index($author_id, InvoiceFilter $filter)
    {
        return InvoiceResource::collection(Invoice::where('user_id', $author_id)->filter($filter)->paginate());
    }
}
