<?php

namespace App\Console\Commands;

use App\Jobs\UpdateWeatherJob;
use App\Models\Cities;
use App\Services\City\CitiesService;
use App\Services\Weather\WeatherService;
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
    public function handle()
    {
       if($this->argument('limit') == 'all'){
         $this->info("200k+ job will be recorded, few minutes required to excuted!"); 
       } 


        DB::table('cities')->select(['lat', 'lon', 'id'])->orderBy('id')->take(100)->chunk(1000, function($cites){
            foreach($cites as $key=>$city){

               UpdateWeatherJob::dispatch($city->lat, $city->lon, $city->id);

               if($key+1 == $this->argument('limit')){
                return false;
               }
            }
        });
        
        return Command::SUCCESS;
    }
}
