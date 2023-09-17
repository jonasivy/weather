<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    /** @var \App\Repositories\CategoryRepository */
    protected $repository;

    /**
     * @param \App\Repositories\CategoryRepository $repository
     * @return void
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
