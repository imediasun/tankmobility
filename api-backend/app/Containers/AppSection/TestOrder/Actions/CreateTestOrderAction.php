<?php

namespace App\Containers\AppSection\TestOrder\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Containers\AppSection\TestOrder\Tasks\CreateTestOrderTask;
use App\Containers\AppSection\TestOrder\UI\API\Requests\CreateTestOrderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateTestOrderAction extends ParentAction
{

    public function run(array $idTests,$orderId): array
    {
        $data = [];
        $result = [];
        $data['order_id'] = $orderId;
        foreach($idTests as $test){
            $data['test_id'] = $test;
           $result[] = app(CreateTestOrderTask::class)->run($data);
        }

        return $result;
    }
}
