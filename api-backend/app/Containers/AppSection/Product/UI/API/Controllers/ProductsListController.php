<?php

namespace App\Containers\AppSection\Product\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Product\Actions\CreateProductAction;
use App\Containers\AppSection\Product\Actions\CreateProductsListAction;
use App\Containers\AppSection\Product\Actions\DeleteProductAction;
use App\Containers\AppSection\Product\Actions\DeleteProductsListAction;
use App\Containers\AppSection\Product\Actions\FindProductByIdAction;
use App\Containers\AppSection\Product\Actions\FindProductsListByIdAction;
use App\Containers\AppSection\Product\Actions\GetAllProductsAction;
use App\Containers\AppSection\Product\Actions\GetAllProductsListAction;
use App\Containers\AppSection\Product\Actions\UpdateProductAction;
use App\Containers\AppSection\Product\Actions\UpdateProductsListAction;
use App\Containers\AppSection\Product\UI\API\Requests\CreateProductRequest;
use App\Containers\AppSection\Product\UI\API\Requests\CreateProductsListRequest;
use App\Containers\AppSection\Product\UI\API\Requests\DeleteProductRequest;
use App\Containers\AppSection\Product\UI\API\Requests\DeleteProductsListRequest;
use App\Containers\AppSection\Product\UI\API\Requests\FindProductByIdRequest;
use App\Containers\AppSection\Product\UI\API\Requests\FindProductsListByIdRequest;
use App\Containers\AppSection\Product\UI\API\Requests\GetAllProductsListRequest;
use App\Containers\AppSection\Product\UI\API\Requests\GetAllProductsRequest;
use App\Containers\AppSection\Product\UI\API\Requests\UpdateProductRequest;
use App\Containers\AppSection\Product\UI\API\Requests\UpdateProductsListRequest;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductsListTransformer;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class ProductsListController extends ApiController
{
    /**
     * @OA\Get(
     *      path="/v1/products-list",
     *      operationId="getAllProductsList",
     *      tags={"ProductsList"},
     *      summary="Get all products lists",
     *      security={{"token":{}}},
     *      description="Returns all products list with pagination",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="array",
     *            @OA\Items(ref="#/components/schemas/ProductsList"),
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

    public function getAllProductsList(GetAllProductsListRequest $request): array
    {
        $products = app(GetAllProductsListAction::class)->run($request);
        return $this->transform($products, ProductsListTransformer::class);
    }

    /**
     * @OA\Get(
     *      path="/v1/products-list/{id}",
     *      operationId="findProductsListById",
     *      tags={"ProductsList"},
     *      summary="find Products List By Id",
     *      security={{"token":{}}},
     *      description="Returns specific products list with details",
     *      @OA\Parameter(
     *          description="ID of ProductsList",
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

    public function findProductsListById(FindProductsListByIdRequest $request): array
    {
        $product = app(FindProductsListByIdAction::class)->run($request);

        return $this->transform($product, ProductsListTransformer::class);
    }

    /**
     * @OA\Post(
     *      path="/v1/products-list",
     *      operationId="createProductsList",
     *      tags={"ProductsList"},
     *      summary="Product",
     *      security={{"bearerAuth":{}}},
     *      description="Returns products list data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateProductsListRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="object",
     *             ref="#/components/schemas/ProductsList"
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

    public function createProductsList(CreateProductsListRequest $request): array
    {
        $data = $request->sanitizeInput([
            'product_id' => $request->product_id,
            'unit' => $request->unit,
            'comment' => $request->comment,
            'dose' => $request->dose,
            'quantity' => $request->quantity,
            'code_basf' => $request->code_basf
        ]);
        $product = app(CreateProductsListAction::class)->run($data);

        return $this->transform($product, ProductsListTransformer::class);
    }


    public function updateProductsList(UpdateProductsListRequest $request): array
    {
        $product = app(UpdateProductsListAction::class)->run($request);

        return $this->transform($product, ProductsListTransformer::class);
    }


    public function deleteProductsList(DeleteProductsListRequest $request): JsonResponse
    {
        app(DeleteProductsListAction::class)->run($request);

        return $this->noContent();
    }
}
