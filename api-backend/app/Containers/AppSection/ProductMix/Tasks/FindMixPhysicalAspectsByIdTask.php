<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\MixPhysicalAspectsRepository;
use App\Containers\AppSection\ProductMix\Models\MixPhysicalAspects;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindMixPhysicalAspectsByIdTask extends ParentTask
{
    public function __construct(
        protected MixPhysicalAspectsRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): MixPhysicalAspects
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
