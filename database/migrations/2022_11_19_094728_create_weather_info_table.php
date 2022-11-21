<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_info', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id')->index();
            $table->string('weather_condition')->nullable();
            $table->decimal('temperature', 5, 2);
            $table->decimal('feels_like', 5,2);
            $table->integer('humidity');
            $table->float('wind_speed');
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_info');
    }
};
