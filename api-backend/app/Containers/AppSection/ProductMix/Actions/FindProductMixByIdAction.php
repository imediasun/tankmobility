<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use App\Containers\AppSection\ProductMix\Models\ProductMix;
use App\Containers\AppSection\ProductMix\Tasks\FindProductMixByIdTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindProductMixByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProductMixByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindProductMixByIdRequest $request): ProductMix
    {
        return app(FindProductMixByIdTask::class)->run($request->id);
    }
}
