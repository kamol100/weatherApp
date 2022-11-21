<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeatherInfo extends Model
{
    use HasFactory;

    protected $table = "weather_info";

    protected $fillable = ["city_id", "weather_condition", "temperature", "feels_like", "humidity", "wind_speed", "icon"];

    public function city():BelongsTo
    {
        return $this->belongsTo(Cities::class);
    }
}
