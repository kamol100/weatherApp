<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 300);
        $file_size = filesize(storage_path('city.list.json'));
        echo "File size ".($file_size/1048576)." mb , May take few minute to execute";

        $cities = json_decode(file_get_contents(storage_path('city.list.json')), true);
        foreach($cities as $city){
           Cities::create([
              "name" => $city['name'],
              "state" => $city['state'],
              "country" => $city['country'],
              "lat" => $city["coord"]["lat"],
              "lon" => $city["coord"]["lon"]
           ]);
        }
    }
}
