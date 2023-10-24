<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use App\Containers\AppSection\TestOrder\Data\Repositories\TestOrderRepository;
use App\Containers\AppSection\TestOrder\Events\TestOrderCreatedEvent;
use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateTestOrderTask extends ParentTask
{
    public function __construct(
        protected TestOrderRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): TestOrder
    {
        try {
            $testorder = $this->repository->create($data);

            return $testorder;
        } catch (Exception $exception) {
            dd($exception->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
