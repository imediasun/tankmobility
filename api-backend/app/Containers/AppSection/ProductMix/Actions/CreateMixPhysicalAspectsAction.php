<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\MixPhysicalAspects;
use App\Containers\AppSection\ProductMix\Tasks\CreateMixGlobalConclusionTask;
use App\Containers\AppSection\ProductMix\Tasks\CreateMixPhysicalAspectsTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\CreateMixPhysicalAspectsRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateMixPhysicalAspectsAction extends ParentAction
{
    /**
     * @param array $physicalAspectsData
     * @return MixPhysicalAspects
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $physicalAspectsData): MixPhysicalAspects
    {
        return app(CreateMixPhysicalAspectsTask::class)->run($physicalAspectsData);
    }
}
