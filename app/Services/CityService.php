<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService
{
    /** @var \App\Repositories\CityRepository */
    protected $repository;

    /**
     * @param \App\Repositories\CityRepository $repository
     * @return void
     */
    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }
}
