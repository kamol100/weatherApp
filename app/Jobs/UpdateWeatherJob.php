<?php

namespace App\Jobs;

use App\Services\Weather\WeatherInfoService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateWeatherJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $lat, protected $lon, protected $city_id)
    {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(WeatherInfoService $weatherInfo)
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=".$this->lat."&lon=".$this->lon."&appid=4c7f1f68689243332f5672f3f5d973e0"; 
        $weather_api = json_decode(file_get_contents($url), true);

        $weather_data = [
            "city_id" => $this->city_id,
            "weather_condition" => $weather_api["weather"][0]["main"],
            "temperature" => $this->kelvinToCelsius($weather_api["main"]["temp"]),
            "feels_like" => $this->kelvinToCelsius($weather_api["main"]["feels_like"]),
            "humidity" => $weather_api["main"]["humidity"],
            "wind_speed" => $this->windSpeedKelometerPerHour($weather_api["wind"]["speed"]),
            "icon" => $weather_api["weather"][0]["icon"]
        ];

        $weatherInfo->create($weather_data);
        
    }

    private function windSpeedKelometerPerHour($wind_speed_meter_second){
         return (($wind_speed_meter_second/1000) * 3600);
    }

    private function kelvinToCelsius($kilvin){
        return $kilvin - 273.15;
    }
}
