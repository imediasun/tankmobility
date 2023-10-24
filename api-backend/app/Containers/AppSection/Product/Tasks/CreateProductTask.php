<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateProductTask extends ParentTask
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Product
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
