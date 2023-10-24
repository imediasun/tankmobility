<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Controllers;

use App\Containers\AppSection\ProductMix\Actions\DeleteProductMixAction;
use App\Containers\AppSection\ProductMix\Actions\FindProductMixByIdAction;
use App\Containers\AppSection\ProductMix\Actions\GetAllProductMixesAction;
use App\Containers\AppSection\ProductMix\Actions\UpdateProductMixAction;
use App\Containers\AppSection\ProductMix\Services\ProductMixService;
use App\Containers\AppSection\ProductMix\UI\API\Requests\CreateProductMixRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\DeleteProductMixRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindProductMixByIdRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\GetAllProductMixesRequest;
use App\Containers\AppSection\ProductMix\UI\API\Requests\UpdateProductMixRequest;
use App\Containers\AppSection\ProductMix\UI\API\Transformers\ProductMixTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use App\Containers\AppSection\ProductMix\DTO\CreateMixDTO;
use ClassTransformer\ClassTransformer;
use App\Containers\AppSection\ProductMix\UI\API\Requests\FindProductMixByBasfNumberRequest;
use App\Containers\AppSection\ProductMix\Actions\FindProductMixByBasfNumberAction;

class ProductMixController extends ApiController
{

    public function __construct(private ProductMixService $productMixService) {}

    public function getAllProductMixes(GetAllProductMixesRequest $request): array
    {
        $productmixes = app(GetAllProductMixesAction::class)->run($request);

        return $this->transform($productmixes, ProductMixTransformer::class);
    }

    public function findProductMixById(FindProductMixByIdRequest $request): array
    {
        $productmix = app(FindProductMixByIdAction::class)->run($request);

        return $this->transform($productmix, ProductMixTransformer::class);
    }


    /**
     * @OA\Post(
     *      path="/v1/product-mixes",
     *      operationId="createProductMix",
     *      tags={"ProductMix"},
     *      summary="ProductMix",
     *      security={{"bearerAuth":{}}},
     *      description="Returns product mix data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateProductMixRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="object",
     *             ref="#/components/schemas/CreateMixDTO"
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
    public function createProductMix(CreateProductMixRequest $request): JsonResponse
    {
        $dto = ClassTransformer::transform(CreateMixDTO::class, $request);
        $mix = $this->productMixService->create($dto);

        return $this->created($this->transform($mix, ProductMixTransformer::class));
    }

    public function updateProductMix(UpdateProductMixRequest $request): array
    {
        $productmix = app(UpdateProductMixAction::class)->run($request);

        return $this->transform($productmix, ProductMixTransformer::class);
    }

    public function deleteProductMix(DeleteProductMixRequest $request): JsonResponse
    {
        app(DeleteProductMixAction::class)->run($request);

        return $this->noContent();
    }

    public function findProductMixByBasfNumber(FindProductMixByBasfNumberRequest $request){
        $productmix = app(FindProductMixByBasfNumberAction::class)->run($request->basf_numer);

        return $this->transform($productmix, ProductMixTransformer::class);
    }
}
