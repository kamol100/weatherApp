<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "city" => new CitiesResource($this->whenLoaded('city')),
            "weather_condition" => $this->weather_condition,
            "temperature" => $this->temperature,
            "feels_like" => $this->feels_like,
            "humidity" => $this->humidity,
            "wind_speed" => $this->wind_speed,
            "icon" => $this->icon
        ];
    }
}
