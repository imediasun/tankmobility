<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use App\Containers\AppSection\ProductMix\Data\Repositories\BiologicCompatibleRepository;
use App\Containers\AppSection\ProductMix\Models\BiologicCompatible;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateBiologicCompatibleTask extends ParentTask
{
    public function __construct(
        protected BiologicCompatibleRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): BiologicCompatible
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
