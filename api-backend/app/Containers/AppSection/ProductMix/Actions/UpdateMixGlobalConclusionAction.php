<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\MixGlobalConclusion;
use App\Containers\AppSection\ProductMix\Tasks\UpdateMixGlobalConclusionTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\UpdateMixGlobalConclusionRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateMixGlobalConclusionAction extends ParentAction
{
    /**
     * @param UpdateMixGlobalConclusionRequest $request
     * @return MixGlobalConclusion
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateMixGlobalConclusionRequest $request): MixGlobalConclusion
    {
        $data = $request->sanitizeInput([
            'mix_id',
            'global_conclusion',
            'comment',
        ]);

        return app(UpdateMixGlobalConclusionTask::class)->run($data, $request->id);
    }
}
