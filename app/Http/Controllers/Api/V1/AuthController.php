<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ApiLoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponses;
    public function login (ApiLoginRequest $request): JsonResponse
    {
        return $this->ok($request->get('email'));
    }

    public function register(): JsonResponse
    {
        return $this->ok('register');
    }
}
