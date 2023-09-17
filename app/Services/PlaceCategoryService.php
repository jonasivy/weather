<?php

namespace App\Services;

use App\Repositories\PlaceCategoryRepository;

class PlaceCategoryService
{
    /** @var \App\Repositories\PlaceCategoryRepository */
    protected $repository;

    /**
     * @param \App\Repositories\PlaceCategoryRepository $repository
     * @return void
     */
    public function __construct(PlaceCategoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
