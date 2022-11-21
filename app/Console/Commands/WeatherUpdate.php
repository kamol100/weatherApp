<?php

namespace App\Console\Commands;

use App\Jobs\UpdateWeatherJob;
use App\Services\City\CitiesService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WeatherUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "weather:update {limit=all}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update weather info after a schedule time';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CitiesService $cities)
    {

        $cities = $cities->getCities();
        foreach($cities as $key=>$city){
           UpdateWeatherJob::dispatch($city->lat, $city->lon, $city->id);
        }

        return Command::SUCCESS;
    }
}
