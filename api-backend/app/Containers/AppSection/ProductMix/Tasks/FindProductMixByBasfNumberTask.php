<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\ProductMixRepository;
use App\Containers\AppSection\ProductMix\Models\ProductMix;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindProductMixByBasfNumberTask extends ParentTask
{
    public function __construct(
        protected ProductMixRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ProductMix
    {
        try {
            return $this->repository->find($id,['basf_number']);
        } catch (Exception $exception) {
           dd($exception->getMessage());
            throw new NotFoundException();
        }
    }
}
