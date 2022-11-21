<?php

namespace App\Services\Weather;
use App\Models\WeatherInfo;
use Carbon\Carbon;

class WeatherInfoService{

    private function model(){
        return (new WeatherInfo());
    }

    public function create(array $data){
        return $this->model()->create($data);
    }

    public function reports(){
        return $this->model()->take(6)->orderBy('id', 'desc')->get();
    }

    public function statistics($city_id):array{
            $data = $this->model()->where('city_id', $city_id)
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->get(["temperature", "humidity", "wind_speed", "created_at"])
            ->sortBy(function($data){
                return Carbon::parse($data->created_at)->format('H');
            })
            ->groupBy(function ($date){
                return Carbon::parse($date->created_at)->format('H');
            });

            $hours = $data->keys();

            return [
              'hours' => $hours,
              "temperature" => $this->calculate($data, $hours, "temperature"),
              "wind_speed" => $this->calculate($data, $hours, "wind_speed"),
              "humidity" => $this->calculate($data, $hours, "humidity")
            ];

    }

    public function calculate($data, $keys, $item):array{
        $result = [];
        foreach($keys as $key){
            $result[] = $data[$key]->collect()->pluck($item)->avg();
        }
        return $result;
    }

}

