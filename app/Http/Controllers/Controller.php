<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function response($output, $success = true, $status = 200):JsonResponse
    {
        $responseType = $success ? 'data':'error';
        return response()->json([
           'success' => $success,
           'status' => $status,
           $responseType => $output
        ], $status);
    }
}
