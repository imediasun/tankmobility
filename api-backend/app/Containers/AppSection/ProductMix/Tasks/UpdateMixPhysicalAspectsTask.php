<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\MixPhysicalAspectsRepository;
use App\Containers\AppSection\ProductMix\Models\MixPhysicalAspects;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateMixPhysicalAspectsTask extends ParentTask
{
    public function __construct(
        protected MixPhysicalAspectsRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): MixPhysicalAspects
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
