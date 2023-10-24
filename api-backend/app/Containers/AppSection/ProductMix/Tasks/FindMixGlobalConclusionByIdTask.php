<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\MixGlobalConclusionRepository;
use App\Containers\AppSection\ProductMix\Models\MixGlobalConclusion;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindMixGlobalConclusionByIdTask extends ParentTask
{
    public function __construct(
        protected MixGlobalConclusionRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): MixGlobalConclusion
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
