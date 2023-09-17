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

    /** @var string */
    public const CACHE_TAG = 'city_query';

    /** @var string */
    public $rememberCacheTag = 'city_query';
}
