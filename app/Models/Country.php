<?php

namespace App\Models;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Country extends Model
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
        'code',
        'name',
        'timezone',
    ];

    /** @var string */
    public const CACHE_TAG = 'country_query';

    /** @var string */
    public $rememberCacheTag = 'country_query';
}
