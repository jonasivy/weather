<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends Repository
{
    /**
     * @return void
     */
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}
