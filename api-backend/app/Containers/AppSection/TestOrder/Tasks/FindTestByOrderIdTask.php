<?php

namespace App\Containers\AppSection\TestOrder\Tasks;

use Illuminate\Database\Eloquent\Collection;
use App\Containers\AppSection\TestOrder\Data\Repositories\TestRepository;
use App\Containers\AppSection\TestOrder\Models\Test;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindTestByOrderIdTask extends ParentTask
{
    public function __construct(
        protected TestRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Collection
    {
        try {
            $tests = $this->repository->where('order_id',$id)->get();

            return $tests;
        } catch (Exception $exception) {
            dd($exception->getMessage());
            throw new NotFoundException();
        }
    }
}
