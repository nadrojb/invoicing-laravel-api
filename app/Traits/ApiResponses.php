<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;
trait ApiResponses
{
    protected function success($message, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }
}


