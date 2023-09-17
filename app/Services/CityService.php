<?php

namespace App\Services;

use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;

class CityService
{
    /** @var \App\Repositories\CityRepository */
    protected $repository;

    /** @var \App\Repositories\CountryRepository */
    protected $countryRepository;

    /**
     * @param \App\Repositories\CityRepository $repository
     * @return void
     */
    public function __construct(CityRepository $repository, CountryRepository $countryRepository)
    {
        $this->repository = $repository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * @var object $params
     * @return \App\Models\City
     */
    public function makeCity($params)
    {
        return $this->repository->firstOrCreate([
            'country_id' => $this->countryRepository->firstOrCreate([
                'code' => $params->country,
            ], [
                'name' => $params->country,
            ])->id,
            'openweather_code' => $params->id,
        ], [
            'name' => $params->name,
            'lon' => $params->coord->lon,
            'lat' => $params->coord->lat,
        ]);
    }
}
