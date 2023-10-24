<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\BiologicCompatibleRepository;
use App\Containers\AppSection\ProductMix\Models\BiologicCompatible;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateBiologicCompatibleTask extends ParentTask
{
    public function __construct(
        protected BiologicCompatibleRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): BiologicCompatible
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
