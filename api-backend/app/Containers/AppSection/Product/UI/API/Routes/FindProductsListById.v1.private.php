<?php

/**
 * @apiGroup           Product
 * @apiName            ProductsListController
 *
 * @api                {GET} /v1/products-list/:id Products List LaborotoryController
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Product\UI\API\Controllers\ProductsListController;
use Illuminate\Support\Facades\Route;

Route::get('products-list/{id}', [ProductsListController::class, 'findProductsListById']);
