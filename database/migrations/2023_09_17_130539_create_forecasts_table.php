<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time')->index();
            $table->unsignedInteger('country_id')->index();
            $table->unsignedInteger('city_id')->index();
            $table->unsignedInteger('weather_id')->index();
            $table->decimal('temp', 8, 2);
            $table->decimal('temp_feels', 8, 2);
            $table->decimal('temp_min', 8, 2);
            $table->decimal('temp_max', 8, 2);
            $table->decimal('pressure', 8, 2);
            $table->decimal('sea_lvl', 8, 2);
            $table->decimal('grnd_lvl', 8, 2);
            $table->decimal('humidity', 8, 2);
            $table->decimal('temp_kf', 8, 2);
            $table->decimal('clouds', 8, 2);
            $table->decimal('wind_speed', 8, 2);
            $table->decimal('wind_deg', 8, 2);
            $table->decimal('wind_gust', 8, 2);
            $table->decimal('visibility', 8, 2);
            $table->decimal('pop', 8, 2);
            $table->decimal('rain_3h', 8, 2)->nullable();
            $table->string('sys_pod');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forecasts');
    }
};
