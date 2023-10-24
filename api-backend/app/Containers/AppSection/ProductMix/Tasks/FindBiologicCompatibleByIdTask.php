<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\BiologicCompatibleRepository;
use App\Containers\AppSection\ProductMix\Models\BiologicCompatible;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindBiologicCompatibleByIdTask extends ParentTask
{
    public function __construct(
        protected BiologicCompatibleRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): BiologicCompatible
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
