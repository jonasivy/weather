<?php

namespace App\Repositories;

use App\Models\PlaceCategory;

class PlaceCategoryRepository extends Repository
{
    /**
     * @return void
     */
    public function __construct(PlaceCategory $model)
    {
        parent::__construct($model);
    }
}
