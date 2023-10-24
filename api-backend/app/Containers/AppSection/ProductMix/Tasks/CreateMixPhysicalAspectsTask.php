<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\MixPhysicalAspectsRepository;
use App\Containers\AppSection\ProductMix\Models\MixPhysicalAspects;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateMixPhysicalAspectsTask extends ParentTask
{
    public function __construct(
        protected MixPhysicalAspectsRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): MixPhysicalAspects
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
