<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use App\Containers\AppSection\TestOrder\Data\Repositories\OrderRepository;
use App\Containers\AppSection\TestOrder\Models\Order;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateOrderTask extends ParentTask
{
    public function __construct(
        protected OrderRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Order
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
