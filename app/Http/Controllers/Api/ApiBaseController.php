<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiBaseController extends Controller
{
    public function respondWithData($data, int $statusCode = 200): JsonResponse
    {
        return response()->json(['data' => $data], $statusCode);
    }

    public function respondWithError($message = 'something went wrong.', int $statusCode = 400): JsonResponse
    {
        return response()->json(['message' => $message,], $$statusCode);
    }

    public function respondSuccessWithMessage(
        $message = 'Your request processed successfully!',
        int $statusCode = 200
    ): JsonResponse {
        return response()->json(['message' => $message], $statusCode);
    }
}
