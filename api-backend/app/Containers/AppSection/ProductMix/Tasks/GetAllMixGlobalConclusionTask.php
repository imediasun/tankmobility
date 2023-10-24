<?php

namespace App\Containers\AppSection\ProductMix\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ProductMix\Data\Repositories\MixGlobalConclusionRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMixGlobalConclusionTask extends ParentTask
{
    public function __construct(
        protected MixGlobalConclusionRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->addRequestCriteria()->repository->paginate();
    }
}
