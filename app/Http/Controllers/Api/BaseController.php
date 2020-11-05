<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * @param $data
     * @return ResponseFactory|Response
     */
    public function returnSuccess($data)
    {
        $response = [
            'status'  => true,
            'message' => 'Success',
            'data'    => $data,
        ];

        return response($response, 200);
    }

    /**
     * @param $data
     * @return ResponseFactory|Response
     */
    public function returnFalse($data = 'No Data Found')
    {
        $response = [
            'status'  => false,
            'message' => 'failed',
            'data'    => $data,
        ];

        return response($response, 200);
    }
}
