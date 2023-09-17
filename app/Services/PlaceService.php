<?php

namespace App\Services;

use App\Repositories\PlaceRepository;

class PlaceService
{
    /** @var \App\Repositories\PlaceRepository */
    protected $repository;

    /**
     * @param \App\Repositories\PlaceRepository $repository
     * @return void
     */
    public function __construct(PlaceRepository $repository)
    {
        $this->repository = $repository;
    }
}
