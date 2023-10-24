<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Models\BiologicCompatible;
use App\Containers\AppSection\ProductMix\Tasks\FindBiologicCompatibleByIdTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindBiologicCompatibleByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindBiologicCompatibleByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindBiologicCompatibleByIdRequest $request): BiologicCompatible
    {
        return app(FindBiologicCompatibleByIdTask::class)->run($request->id);
    }
}
