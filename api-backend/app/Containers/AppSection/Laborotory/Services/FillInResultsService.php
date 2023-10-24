<?php

namespace App\Containers\AppSection\Laborotory\Services;


use App\Containers\AppSection\Laborotory\Tasks\CreateCommentsCompatibilityTask;
use App\Containers\AppSection\Laborotory\Tasks\CreateMousseCompatibilityTask;
use App\Containers\AppSection\Laborotory\Tasks\FilterOneCompatibilityTask;
use App\Containers\AppSection\Laborotory\Tasks\CreateDepositCompatibilityTask;
use ClassTransformer\ClassTransformer;
use Illuminate\Support\Facades\DB;
use App\Containers\AppSection\Laborotory\DTO\FillInResultsFromServiceDTO;
use App\Containers\AppSection\Laborotory\Tasks\FilterTwoCompatibilityTask;
use App\Containers\AppSection\Laborotory\Tasks\FilterTreeCompatibilityTask;

class FillInResultsService
{

    public function create(array $data) :FillInResultsFromServiceDTO
    {
        $result = DB::transaction(function () use ($data) {
            foreach($data as $key=>$obj){
                $result['deposit'] =  app(CreateDepositCompatibilityTask::class)->run($obj->testCompatibilityDeposit);
                $result['mousse'] =  app(CreateMousseCompatibilityTask::class)->run($obj->testCompatibilityMousse);
                $result['comment'] =  app(CreateCommentsCompatibilityTask::class)->run($obj->testCompatibilityComments);
                $result['filter300'] =  app(FilterOneCompatibilityTask::class)->run($obj->testCompatibilityFilterOne );
                $result['filter150'] =  app(FilterTwoCompatibilityTask::class)->run($obj->testCompatibilityFilterTwo );
                $result['filter50'] =  app(FilterTreeCompatibilityTask::class)->run($obj->testCompatibilityFilterTree );
            }

            return $result;
        });

        return ClassTransformer::transform(FillInResultsFromServiceDTO::class, $result);
    }

}
