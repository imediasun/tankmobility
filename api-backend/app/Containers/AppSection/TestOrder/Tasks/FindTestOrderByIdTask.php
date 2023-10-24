<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use App\Containers\AppSection\TestOrder\Data\Repositories\TestOrderRepository;
use App\Containers\AppSection\TestOrder\Events\TestOrderFoundByIdEvent;
use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindTestOrderByIdTask extends ParentTask
{
    public function __construct(
        protected TestOrderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): TestOrder
    {
        try {
            $testorder = $this->repository->find($id);
            TestOrderFoundByIdEvent::dispatch($testorder);

            return $testorder;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
