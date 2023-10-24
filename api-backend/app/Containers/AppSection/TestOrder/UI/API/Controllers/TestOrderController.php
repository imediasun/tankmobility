<?php

namespace App\Containers\AppSection\TestOrder\UI\API\Controllers;

use App\Containers\AppSection\TestOrder\DTO\CreateTestOrderDTO;
use App\Containers\AppSection\Laborotory\Services\FillInResultsService;
use App\Containers\AppSection\TestOrder\Actions\DeleteTestOrderAction;
use App\Containers\AppSection\TestOrder\Actions\FindTestOrderByIdAction;
use App\Containers\AppSection\TestOrder\Actions\GetAllTestOrdersAction;
use App\Containers\AppSection\TestOrder\Actions\UpdateTestOrderAction;
use App\Containers\AppSection\TestOrder\UI\API\Requests\CreateTestOrderRequest;
use App\Containers\AppSection\TestOrder\UI\API\Requests\DeleteTestOrderRequest;
use App\Containers\AppSection\TestOrder\UI\API\Requests\FindTestOrderByIdRequest;
use App\Containers\AppSection\TestOrder\UI\API\Requests\GetAllTestOrdersRequest;
use App\Containers\AppSection\TestOrder\UI\API\Requests\UpdateTestOrderRequest;
use App\Containers\AppSection\TestOrder\UI\API\Requests\GetOrdersToBeValidatedRequest;
use App\Containers\AppSection\TestOrder\UI\API\Transformers\TestOrderTransformer;
use App\Ship\Parents\Controllers\ApiController;
use ClassTransformer\ClassTransformer;
use Illuminate\Http\JsonResponse;
use App\Containers\AppSection\TestOrder\UI\API\Transformers\GetTestOrderTransformer;
use App\Containers\AppSection\TestOrder\UI\API\Transformers\AllTestOrdersTransformer;
use App\Containers\AppSection\TestOrder\Services\TestOrderService;
/**
 * @OA\Info(title="BASF TankMobility API", version="0.1")
 */

class TestOrderController extends ApiController
{
    public function __construct(private TestOrderService $testOrderService) {

    }
    /**
     * @OA\Post(
     *      path="/v1/test-orders",
     *      operationId="createTestOrder",
     *      tags={"Test Order"},
     *      summary="Test Order",
     *      security={{"bearerAuth":{}}},
     *      description="Returns test order data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateTestOrderRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="object",
     *             ref="#/components/schemas/CreateTestOrderDTO"
     * ),
     * ),
     * ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function createTestOrder(CreateTestOrderRequest $request): JsonResponse
    {

        $input = $request->input();
        $i = 0;
        while($i < count($input))
        {
            $value = $input[$i];
            $dto[] = ClassTransformer::transform(CreateTestOrderDTO::class, $value);

            $i ++;
        }

       $testOrder = $this->testOrderService->create($dto);

       return $this->created($this->transform($testOrder, TestOrderTransformer::class));
    }


    /**
     * @OA\Get(
     *      path="/v1/test-orders/{id}",
     *      operationId="findTestOrderById",
     *      tags={"Test Orders"},
     *      summary="find Test Order By Id",
     *      security={{"token":{}}},
     *      description="Returns specific test order with details",
     *      @OA\Parameter(
     *          description="ID of TestOrder",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="1",
     *          @OA\Schema(
     *               type="integer",
     *              format="int64"
     *    )
     * ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="array",
     *            @OA\Items(ref="#/components/schemas/TestOrder"),
     * ),
     * ),
     * ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function findTestOrderById(FindTestOrderByIdRequest $request): array
    {
        $testorder = app(FindTestOrderByIdAction::class)->run($request);

        return $this->transform($testorder, AllTestOrdersTransformer::class);
    }

    /**
     * @OA\Get(
     *      path="/v1/test-orders",
     *      operationId="getAllTestOrders",
     *      tags={"Test Orders"},
     *      summary="Get all test orders",
     *      security={{"token":{}}},
     *      description="Returns all test orders with pagination",
     *       @OA\Parameter(
     *          description="orders-to-be-performed",
     *          in="path",
     *          name="orders-to-be-performed",
     *          required=false,
     *          example="1",
     *          @OA\Schema(
     *               type="integer",
     *    )
     * ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="array",
     *            @OA\Items(ref="#/components/schemas/CreateTestOrderDTO"),
     * ),
     * ),
     * ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function getAllTestOrders(GetAllTestOrdersRequest $request)
    {
        $data['filters'] = $this->filterCreator($request);
        $testOrder = [];
        $testorders = app(GetAllTestOrdersAction::class)->run($data);

        $result = [];

        if($testorders){
            foreach($testorders as $obj){
                $result[] = $this->transform($obj, GetTestOrderTransformer::class);
            }

        }




        return $this->created($result);
    }


}
