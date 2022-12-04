<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    /**
     * @param $data
     * @param int $status_code
     * @return JsonResponse
     */
    public function jsonResponse($data, int $status_code = 200): JsonResponse
    {
        return response()->json(['status_code' => $status_code, 'data' => $data]);
    }
}
