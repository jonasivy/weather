<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService
{
    /** @var \App\Repositories\CountryRepository */
    protected $repository;

    /**
     * @param \App\Repositories\CountryRepository $repository
     * @return void
     */
    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @var array $params
     * @return \App\Models\Country
     */
    public function makeCountry($params)
    {
        return $this->repository->firstOrCreate([
            'code' => $params['code']
        ], [
            'name' => $params['name'],
            'timezone' => $params['timezone'],
        ]);
    }
}
