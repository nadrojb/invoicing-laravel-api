<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Http\Requests\Api\V1\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorsController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        if ($this->include('invoices')) {
            return UserResource::collection(User::with('invoices')->paginate());
        }
        return UserResource::collection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(User $author): UserResource
    {
        if ($this->include('invoices')) {
            return new UserResource($author->load('invoices'));
        }
        return new UserResource($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

    }
}
