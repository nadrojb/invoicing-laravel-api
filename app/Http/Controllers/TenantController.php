<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRequest;
use App\Http\Resources\TenantResource;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function index()
    {
        return TenantResource::collection(Tenant::all());
    }

    public function store(TenantRequest $request)
    {
        return new TenantResource(Tenant::create($request->validated()));
    }

    public function show(Tenant $tenant)
    {
        return new TenantResource($tenant);
    }

    public function update(TenantRequest $request, Tenant $tenant)
    {
        $tenant->update($request->validated());

        return new TenantResource($tenant);
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return response()->json();
    }
}
