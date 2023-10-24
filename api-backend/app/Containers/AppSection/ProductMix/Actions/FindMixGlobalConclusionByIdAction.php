<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Models\MixGlobalConclusion;
use App\Containers\AppSection\ProductMix\Tasks\FindMixGlobalConclusionByIdTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindMixGlobalConclusionByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindMixGlobalConclusionByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindMixGlobalConclusionByIdRequest $request): MixGlobalConclusion
    {
        return app(FindMixGlobalConclusionByIdTask::class)->run($request->id);
    }
}
