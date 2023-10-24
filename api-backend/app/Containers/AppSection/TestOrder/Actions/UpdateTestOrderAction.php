<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Containers\AppSection\TestOrder\Tasks\UpdateTestOrderTask;
use App\Containers\AppSection\TestOrder\UI\API\Requests\UpdateTestOrderRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateTestOrderAction extends ParentAction
{
    /**
     * @param UpdateTestOrderRequest $request
     * @return TestOrder
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateTestOrderRequest $request): TestOrder
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateTestOrderTask::class)->run($data, $request->id);
    }
}
