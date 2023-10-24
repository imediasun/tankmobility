<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use App\Containers\AppSection\TestOrder\Data\Repositories\TestsProductsListRepository;
//use App\Containers\AppSection\TestOrder\Events\TestCreatedEvent;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use App\Containers\AppSection\TestOrder\Models\TestsProductsList;
use Exception;

class CreateTestsProductsListsTask extends ParentTask
{
    public function __construct(
        protected TestsProductsListRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data ): TestsProductsList
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
