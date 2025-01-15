<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request): JsonResponse
    {
       $request->validated($request->all());//validated returns an array of the data that was successfully validated from the form request.

        if(!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->error('User not found', 404);
        }

        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken('API token for' . $user->email)->plainTextToken
            ]
        );
    }

   public function logout (Request $request)
   {
       $request->user()->currentAccessToken()->delete();

       return $this->ok('');
   }
}
