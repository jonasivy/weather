<?php

namespace App\Services;

use App\Repositories\WeatherRepository;

class WeatherService
{
    /** @var \App\Repositories\WeatherRepository */
    protected $repository;

    /**
     * @param \App\Repositories\WeatherRepository $repository
     * @return void
     */
    public function __construct(WeatherRepository $repository)
    {
        $this->repository = $repository;
    }
}
