<?php

namespace App\Services\City;

use App\Models\Cities;

class CitiesService{

    public function model(){
        return (new Cities());
    }

    public function getCities($data = []){
        return $this->model()->get($data);
    }

    public function getCountryFromCities(){
        return $this->model()->get([ 'country'])->groupBy("country");
    }
}