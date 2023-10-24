<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\MixGlobalConclusionRepository;
use App\Containers\AppSection\ProductMix\Models\MixGlobalConclusion;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateMixGlobalConclusionTask extends ParentTask
{
    public function __construct(
        protected MixGlobalConclusionRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): MixGlobalConclusion
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
