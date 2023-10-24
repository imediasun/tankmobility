<?php

namespace App\Containers\AppSection\Laborotory\Tasks;

use App\Containers\AppSection\Laborotory\Data\Repositories\FilterTwoCompatibilityRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use App\Containers\AppSection\Laborotory\Models\DepositCompatibility;

class FilterTwoCompatibilityTask extends ParentTask
{
    public function __construct(
        protected FilterTwoCompatibilityRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): DepositCompatibility
    {
        try {

            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
