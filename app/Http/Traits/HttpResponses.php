<?php

namespace App\Http\Traits;

use Illuminate\Http\Response;

trait HttpResponses
{

    public function successResponse($data, $message = null, $code = Response::HTTP_OK)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,


        ], $code);
    }
    public function errorResponse($data = null, $message = null, $code = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,

        ]);
    }
}
