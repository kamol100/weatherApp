<?php

namespace App\Console\Commands;

use App\Jobs\UpdateWeatherJob;
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

        DB::table('cities')
            ->select(['lat', 'lon', 'id'])
            ->orderBy('id')
            ->chunk(1000, function($cites){
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
