<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\TestOrder\Data\Repositories\TestRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Ship\Criterias\OrdersToBeValidated;

class GetAllTestsToBeValidatedTask extends ParentTask
{
    public function __construct(
        protected TestRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(array $data)
    {

        $collection = $this->repository->pushCriteria(new OrdersToBeValidated($data['filters']))->get();

        return $this->paginate($collection->sortBy('last_seen_at'), $data['filters']['limit'], $data['filters']['page']);

    }
}
