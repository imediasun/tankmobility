<?php

namespace App\Containers\AppSection\Laborotory\Actions;

use App\Containers\AppSection\Laborotory\Models\TestCompatibility;
use App\Containers\AppSection\Laborotory\Tasks\FillInResultTask;
use App\Containers\AppSection\Laborotory\UI\API\Requests\FillInResultsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class FillInResultAction extends ParentAction
{
    public function run(FillInResultsRequest $request): TestCompatibility
    {
        $data = $request->sanitizeInput([
            'test_id' => $request->test_id,
            'deposit' => $request->deposit,
            'mousse' => $request->mousse,
            'number_of_reversals' => $request->number_of_reversals,
            'filter300' => $request->filter300,
            'filter150' => $request->filter150,
            'filter50' => $request->filter150,
            'comment' => $request->comment,
            'compatibility_conclusion' => $request->compatibility_conclusion
        ]);
        return app(FillInResultTask::class)->run($data);
    }
}
