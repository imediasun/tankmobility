<?php

namespace App\Containers\AppSection\Laborotory\Tasks;

use App\Containers\AppSection\TestOrder\Data\Repositories\TestRepository;
use App\Containers\AppSection\TestOrder\Models\Test;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class PerformTestTask extends ParentTask
{
    public function __construct(
        protected TestRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($test_id,array $data): Test
    {
        try {

            return $this->repository->update($data,$test_id);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
