<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class APIReturn
{
    public static function success($data = null, $message = 'Success', $code = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,

        ], $code);
    }

    public static function error($message = 'Error', $code = 400, $detail = null): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'detail' => $detail,
        ], $code);
    }
}
