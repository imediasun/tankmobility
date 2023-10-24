<?php

namespace App\Containers\AppSection\Laborotory\UI\API\Controllers;

use App\Containers\AppSection\Laborotory\Actions\PerformTestAction;

use App\Containers\AppSection\Laborotory\UI\API\Requests\FillInResultsRequest;
use App\Containers\AppSection\Laborotory\UI\API\Requests\PerformTestRequest;
use App\Containers\AppSection\Laborotory\DTO\FillInResultsFromServiceDTO;
use App\Containers\AppSection\TestOrder\UI\API\Transformers\TestOrderTransformer;
use App\Containers\AppSection\TestOrder\UI\API\Transformers\TestTransformer;
use App\Ship\Parents\Controllers\ApiController;
use ClassTransformer\ClassTransformer;
use Illuminate\Http\JsonResponse;
use App\Containers\AppSection\Laborotory\Services\FillInResultsService;

class LaborotoryController extends ApiController
{
    public function __construct(protected FillInResultsService $fillInResultsService) {

    }
    public function performTest(PerformTestRequest $request): JsonResponse
    {
        $performedTest = app(PerformTestAction::class)->run($request);

        return $this->created($this->transform($performedTest, TestTransformer::class));
    }

    public function fillResults(FillInResultsRequest $request): JsonResponse
    {
        dd(1);
        $input = $request->input();
        $i = 0;
        while($i < count($input))
        {
            $value = $input[$i];
            $dto[] = ClassTransformer::transform(FillInResultsFromServiceDTO::class, $value);

            $i ++;
        }
        $testOrder = $this->fillInResultsService->create($dto);

        return $this->created($this->transform($testOrder, TestOrderTransformer::class));
    }


}
