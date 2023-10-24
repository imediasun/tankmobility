<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\TestOrder\Tasks\GetAllTestOrdersTask;
use App\Containers\AppSection\TestOrder\UI\API\Requests\GetAllTestOrdersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Containers\AppSection\TestOrder\Models\TestOrder;

class GetAllTestOrdersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(array $data)
    {
        return app(GetAllTestOrdersTask::class)->run($data);
    }
}
