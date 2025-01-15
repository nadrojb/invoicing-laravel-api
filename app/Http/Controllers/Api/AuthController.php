<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginUserRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponses;
    public function login (LoginUserRequest $request): JsonResponse
    {
        return $this->ok($request->get('email'));
    }

    public function register(): JsonResponse
    {
        return $this->ok('register');
    }
}
