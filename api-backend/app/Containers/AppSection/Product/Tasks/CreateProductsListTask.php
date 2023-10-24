<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductsListRepository;
use App\Containers\AppSection\Product\Models\ProductsList;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateProductsListTask extends ParentTask
{
    protected ProductsListRepository $repository;

    public function __construct(ProductsListRepository $repository) {
        $this->repository = $repository;
    }
    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ProductsList
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            dd($e->getMessage() );
            throw new CreateResourceFailedException();
        }
    }
}
