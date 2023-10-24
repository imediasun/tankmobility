<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\BiologicCompatible;
use App\Containers\AppSection\ProductMix\Tasks\CreateBiologicCompatibleTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\CreateBiologicCompatibleRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateBiologicCompatibleAction extends ParentAction
{
    /**
     * @param CreateBiologicCompatibleRequest $request
     * @return BiologicCompatible
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $biologicConclusionData): BiologicCompatible
    {
        return app(CreateBiologicCompatibleTask::class)->run($biologicConclusionData);
    }
}
