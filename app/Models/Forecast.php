<?php

namespace App\Models;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    use HasFactory;
    use Cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_time',
        'weather_id',
        'temp',
        'temp_feels',
        'temp_min',
        'temp_max',
        'pressure',
        'sea_lvl',
        'grnd_lvl',
        'humidity',
        'temp_kf',
        'clouds',
        'wind_speed',
        'wind_deg',
        'wind_gust',
        'visibility',
        'pop',
        'rain_3h',
        'sys_pod',
    ];
}
