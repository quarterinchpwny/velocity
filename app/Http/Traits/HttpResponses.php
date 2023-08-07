<?php

namespace App\Http\Traits;

use Illuminate\Http\Response;

trait HttpResponses
{

    public function success($data, $message = null, $code = Response::HTTP_OK)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,


        ], $code);
    }
    public function error($data, $message = null, $code = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,

        ]);
    }
}
