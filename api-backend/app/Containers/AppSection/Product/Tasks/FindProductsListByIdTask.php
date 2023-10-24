<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductsListRepository;
use App\Containers\AppSection\Product\Models\ProductsList;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindProductsListByIdTask extends ParentTask
{
    public function __construct(
        protected ProductsListRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ProductsList
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
