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
}
