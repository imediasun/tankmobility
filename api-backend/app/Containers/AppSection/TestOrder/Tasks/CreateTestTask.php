<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use App\Containers\AppSection\TestOrder\Data\Repositories\TestRepository;
//use App\Containers\AppSection\TestOrder\Events\TestCreatedEvent;
use App\Containers\AppSection\TestOrder\Models\Test;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use App\Containers\AppSection\TestOrder\Models\TestOrder;
use Exception;

class CreateTestTask extends ParentTask
{
    public function __construct(
        protected TestRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data ): Test
    {
        try {
            $test = $this->repository->create($data);

            return $test;
        } catch (Exception $exception) {
            dd($exception->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
