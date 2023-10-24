<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use App\Containers\AppSection\TestOrder\Data\Repositories\TestRepository;
use App\Containers\AppSection\TestOrder\Models\Test;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindTestByIdTask extends ParentTask
{
    public function __construct(
        protected TestRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Test
    {
        try {
            $testorder = $this->repository->find($id);

            dd($testorder);

            return $testorder;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
