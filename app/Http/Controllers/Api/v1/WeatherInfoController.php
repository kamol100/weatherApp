<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherInfoResource;
use App\Services\Weather\WeatherInfoService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WeatherInfoController extends Controller
{
    public function __construct(protected WeatherInfoService $weatherInfo)
    {}


    public function getWeatherReports():JsonResponse{

        $info =  $this->weatherInfo->reports();
        $info = WeatherInfoResource::collection($info->load('city'));

        return $this->response($info);
    }

    public function getStatistics(Request $request){
        return $this->weatherInfo->statistics($request->input('city'));
    }

}
