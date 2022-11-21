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
