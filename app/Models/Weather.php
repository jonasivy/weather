<?php

namespace App\Models;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Weather extends Model
{
    use HasFactory;
    use Rememberable;
    use Cacheable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weathers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'icon_path',
    ];

    /** @var string */
    public const CACHE_TAG = 'weather_query';

    /** @var string */
    public $rememberCacheTag = 'weather_query';
}
