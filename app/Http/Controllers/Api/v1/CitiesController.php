<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CitiesResource;
use App\Services\City\CitiesService;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function __construct(protected CitiesService $cities)
    {}

    public function getCities(){
        $cities = $this->cities->getCities();
        $cities = CitiesResource::collection($cities);

        return $this->response($cities);
    }

}
