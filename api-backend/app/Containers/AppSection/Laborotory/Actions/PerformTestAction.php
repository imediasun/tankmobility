<?php

namespace App\Containers\AppSection\Laborotory\Actions;

use App\Containers\AppSection\TestOrder\Models\Test;
use App\Containers\AppSection\Laborotory\Tasks\PerformTestTask;
use App\Containers\AppSection\Laborotory\UI\API\Requests\PerformTestRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class PerformTestAction extends ParentAction
{
    public function run(PerformTestRequest $request): Test
    {
        $test_id = $request->test_id;

        $data['performed'] = true;
        return app(PerformTestTask::class)->run($test_id,$data);
    }
}
