<?php

namespace App\Repositories;

use App\Models\Weather;

class WeatherRepository extends Repository
{
    /**
     * @return void
     */
    public function __construct(Weather $model)
    {
        parent::__construct($model);
    }
}
