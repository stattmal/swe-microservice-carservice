<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /**
     * @param $data
     * @param array $meta
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function success($data, $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => $code,
            'message' => JsonResponse::$statusTexts[$code] = 'ok',
            'data' => $data,
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_OK);
    }


    /**
     * @param $data
     * @param array $meta
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function created($data, $code = 201)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => $code,
            'message' => JsonResponse::$statusTexts[$code] = 'created',
            'data' => $data,
        ], isset(JsonResponse::$statusTexts[$code]) ? $code : JsonResponse::HTTP_CREATED);
    }
}
