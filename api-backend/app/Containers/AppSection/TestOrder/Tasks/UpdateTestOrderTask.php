<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use App\Containers\AppSection\TestOrder\Data\Repositories\TestOrderRepository;
use App\Containers\AppSection\TestOrder\Events\TestOrderUpdatedEvent;
use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateTestOrderTask extends ParentTask
{
    public function __construct(
        protected TestOrderRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): TestOrder
    {
        try {
            $testorder = $this->repository->update($data, $id);
            TestOrderUpdatedEvent::dispatch($testorder);

            return $testorder;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
