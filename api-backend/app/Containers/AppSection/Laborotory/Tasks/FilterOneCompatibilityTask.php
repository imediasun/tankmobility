<?php

namespace App\Containers\AppSection\Laborotory\Tasks;

use App\Containers\AppSection\Laborotory\Data\Repositories\FilterOneCompatibilityRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use App\Containers\AppSection\Laborotory\Models\DepositCompatibility;

class FilterOneCompatibilityTask extends ParentTask
{
    public function __construct(
        protected FilterOneCompatibilityRepository $repository
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
