<?php

namespace App\Containers\AppSection\ProductMix\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ProductMix\Models\MixPhysicalAspects;
use App\Containers\AppSection\ProductMix\Tasks\UpdateMixPhysicalAspectsTask;
use App\Containers\AppSection\ProductMix\UI\API\Requests\UpdateMixPhysicalAspectsRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateMixPhysicalAspectsAction extends ParentAction
{
    /**
     * @param UpdateMixPhysicalAspectsRequest $request
     * @return MixPhysicalAspects
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateMixPhysicalAspectsRequest $request): MixPhysicalAspects
    {
        $data = $request->sanitizeInput([
            'mix_id',
            'volume',
            'ph_rate',
            'water_quality',
            'conclusion',
            'comment',
            'agitation',
            'introduction'
        ]);

        return app(UpdateMixPhysicalAspectsTask::class)->run($data, $request->id);
    }
}
