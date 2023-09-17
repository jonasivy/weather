<?php

namespace App\Models;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class City extends Model
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
        'country_id',
        'openweather_code',
        'name',
        'lon',
        'lat',
        'population',
        'sunrise',
        'sunset',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sunrise' => 'datetime',
        'sunset' => 'datetime',
    ];

    /** @var string */
    public const CACHE_TAG = 'city_query';

    /** @var string */
    public $rememberCacheTag = 'city_query';
}
