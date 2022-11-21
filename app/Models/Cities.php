<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = ['name', 'lat', 'lon', 'country', 'state'];

    public function weatherInfo(){
        return $this->hasMany(WeatherInfo::class);
    }
}
