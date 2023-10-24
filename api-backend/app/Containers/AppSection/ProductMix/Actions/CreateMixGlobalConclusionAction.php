<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\MixGlobalConclusion;
use App\Containers\AppSection\ProductMix\Tasks\CreateMixGlobalConclusionTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\CreateMixGlobalConclusionRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateMixGlobalConclusionAction extends ParentAction
{
    /**
     * @param CreateMixGlobalConclusionRequest $request
     * @return MixGlobalConclusion
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $globalConclusionData): MixGlobalConclusion
    {
        return app(CreateMixGlobalConclusionTask::class)->run($globalConclusionData);
    }
}
