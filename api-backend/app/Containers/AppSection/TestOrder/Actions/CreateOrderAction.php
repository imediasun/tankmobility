<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\TestOrder\Models\Order;
use App\Containers\AppSection\TestOrder\Tasks\CreateOrderTask;
use App\Containers\AppSection\TestOrder\UI\API\Requests\CreateTestOrderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateOrderAction extends ParentAction
{

    public function run(array $data): Order
    {
        return app(CreateOrderTask::class)->run($data);
    }
}
