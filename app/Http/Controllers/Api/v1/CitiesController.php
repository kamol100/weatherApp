<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\City\CitiesService;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function __construct(protected CitiesService $cities)
    {}

    public function getCountry(){
        return $this->cities->getCountryFromCities();
    }
}
