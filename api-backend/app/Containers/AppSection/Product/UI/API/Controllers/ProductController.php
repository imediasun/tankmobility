<?php

namespace App\Containers\AppSection\Product\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Product\Actions\CreateProductAction;
use App\Containers\AppSection\Product\Actions\DeleteProductAction;
use App\Containers\AppSection\Product\Actions\FindProductByIdAction;
use App\Containers\AppSection\Product\Actions\GetAllProductsAction;
use App\Containers\AppSection\Product\Actions\UpdateProductAction;
use App\Containers\AppSection\Product\UI\API\Requests\CreateProductRequest;
use App\Containers\AppSection\Product\UI\API\Requests\DeleteProductRequest;
use App\Containers\AppSection\Product\UI\API\Requests\FindProductByIdRequest;
use App\Containers\AppSection\Product\UI\API\Requests\GetAllProductsRequest;
use App\Containers\AppSection\Product\UI\API\Requests\UpdateProductRequest;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class ProductController extends ApiController
{
    /**
     * @OA\Get(
     *      path="/v1/products",
     *      operationId="getAllProducts",
     *      tags={"Products"},
     *      summary="Get all products",
     *      security={{"token":{}}},
     *      description="Returns all products with pagination",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="array",
     *            @OA\Items(ref="#/components/schemas/Product"),
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
    public function getAllProducts(GetAllProductsRequest $request): array
    {
        $products = app(GetAllProductsAction::class)->run($request);
        return $this->transform($products, ProductTransformer::class);
    }

    /**
     * @OA\Get(
     *      path="/v1/products/{id}",
     *      operationId="findProductById",
     *      tags={"Products"},
     *      summary="find Product By Id",
     *      security={{"token":{}}},
     *      description="Returns specific product with details",
     *      @OA\Parameter(
     *          description="ID of Product",
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

    public function findProductById(FindProductByIdRequest $request): array
    {
        $product = app(FindProductByIdAction::class)->run($request);

        return $this->transform($product, ProductTransformer::class);
    }

    /**
     * @OA\Post(
     *      path="/v1/products",
     *      operationId="createTestOrder",
     *      tags={"Product"},
     *      summary="Product",
     *      security={{"bearerAuth":{}}},
     *      description="Returns product data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateProductRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *     @OA\Property(
     *              property="data",
     *              type="object",
     *             ref="#/components/schemas/Product"
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
    public function createProduct(CreateProductRequest $request): array
    {
        $product = app(CreateProductAction::class)->run($request);

        return $this->transform($product, ProductTransformer::class);
    }


    public function updateProduct(UpdateProductRequest $request): array
    {
        $product = app(UpdateProductAction::class)->run($request);

        return $this->transform($product, ProductTransformer::class);
    }


    public function deleteProduct(DeleteProductRequest $request): JsonResponse
    {
        app(DeleteProductAction::class)->run($request);

        return $this->noContent();
    }
}
