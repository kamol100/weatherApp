<?php

namespace App\Services\City;

use App\Models\Cities;

class CitiesService{

    public function model(){
        return (new Cities());
    }

    public function getCities(){
        return $this->model()->take(100)->get();
    }

}
