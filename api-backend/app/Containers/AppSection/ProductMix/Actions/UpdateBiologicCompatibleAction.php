<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\BiologicCompatible;
use App\Containers\AppSection\ProductMix\Tasks\UpdateBiologicCompatibleTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\UpdateBiologicCompatibleRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateBiologicCompatibleAction extends ParentAction
{
    /**
     * @param UpdateBiologicCompatibleRequest $request
     * @return BiologicCompatible
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateBiologicCompatibleRequest $request): BiologicCompatible
    {
        $data = $request->sanitizeInput([
            'mix_id',
            'biologic_conclusion',
            'comment'
        ]);

        return app(UpdateBiologicCompatibleTask::class)->run($data, $request->id);
    }
}
