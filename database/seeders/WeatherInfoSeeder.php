<?php

namespace Database\Seeders;

use App\Models\WeatherInfo;
use App\Services\City\CitiesService;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(CitiesService $cities)
    {
        $weather = ["Clear", "Rain", "Clouds"];
        $temps = [20, 25, -5, 30, 11, 3];
        $humidity = [50, 60, 70, 80, 90, 55];
        $wind_speed = ['1.20', '12', '14', '24', '9.5'];
        $icon = ['01d', '02d', '04d', '10d', '13d', '09d'];
        $cities = $cities->getCities();
        foreach ($cities as $city){
            for($i = 24; $i > 0; $i--){
                WeatherInfo::create([
                    'city_id' => $city->id,
                    'weather_condition' => $weather[array_rand($weather)],
                    'temperature' => $temps[array_rand($temps)],
                    'feels_like' => $temps[array_rand($temps)],
                    'humidity' => $humidity[array_rand($humidity)],
                    'wind_speed' => $wind_speed[array_rand($wind_speed)],
                    'icon' => $icon[array_rand($icon)],
                    'created_at' => Carbon::now()->subHours($i)
                ]);
            }

        }
    }
}
