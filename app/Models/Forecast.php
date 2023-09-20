<?php

namespace App\Models;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Forecast extends Model
{
    use HasFactory;
    use Rememberable;
    use Cacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_time',
        'country_id',
        'city_id',
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

    /** @var string */
    public const CACHE_TAG = 'forecast_query';

    /** @var string */
    public $rememberCacheTag = 'forecast_query';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function weather()
    {
        return $this->belongsTo(Weather::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCountry($query, $value)
    {
        return $query->where('country.name', 'like', "%{$value}%");
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCity($query, $value)
    {
        return $query->where('city.name', 'like', "%{$value}%");
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param datetime $start_date
     * @param datetime $end_date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDateBetween($query, $start_date, $end_date)
    {
        return $query->whereBetween('date_time', [
            $start_date,
            $end_date
        ]);
    }
}
