<?php

namespace App\Repositories;

use App\Models\Place;

class PlaceRepository extends Repository
{
    /**
     * @return void
     */
    public function __construct(Place $model)
    {
        parent::__construct($model);
    }
}
