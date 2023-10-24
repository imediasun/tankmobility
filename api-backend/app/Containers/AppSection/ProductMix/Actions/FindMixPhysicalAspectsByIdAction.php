<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Models\MixPhysicalAspects;
use App\Containers\AppSection\ProductMix\Tasks\FindMixPhysicalAspectsByIdTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindMixPhysicalAspectsByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindMixPhysicalAspectsByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindMixPhysicalAspectsByIdRequest $request): MixPhysicalAspects
    {
        return app(FindMixPhysicalAspectsByIdTask::class)->run($request->id);
    }
}
