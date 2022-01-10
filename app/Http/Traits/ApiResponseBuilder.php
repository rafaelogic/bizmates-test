<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseBuilder
{
    protected function successResponse($data, string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'status'  => 'Success',
            'message' => $message,
            'data'    => $data
        ], $code);
    }

    protected function errorResponse(string $message = null, int $code = 404): JsonResponse
    {
        return response()->json([
            'status'   => 'Error',
            'message'  => $message,
            'data'     => null
        ], $code);
    }
}
