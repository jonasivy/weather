<?php

namespace App\Models;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Place extends Model
{
    use HasFactory;
    use Rememberable;
    use Cacheable;

    /** @var string */
    public const CACHE_TAG = 'place_query';

    /** @var string */
    public $rememberCacheTag = 'place_query';
}
