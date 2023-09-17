<?php

namespace App\Repositories;

use App\Models\Forecast;

class ForecastRepository extends Repository
{
    /**
     * @return void
     */
    public function __construct(Forecast $model)
    {
        parent::__construct($model);
    }
}
