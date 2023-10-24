<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\ProductMixRepository;
use App\Containers\AppSection\ProductMix\Models\ProductMix;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateProductMixTask extends ParentTask
{
    public function __construct(
        protected ProductMixRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ProductMix
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            dd($e->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
