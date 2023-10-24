<?php

/**
 * @apiGroup           ProductMix
 * @apiName            FindProductMixById
 *
 * @api                {GET} /v1/product-mixes/:id Find Product Mix By Id
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

use App\Containers\AppSection\ProductMix\UI\API\Controllers\ProductMixController;
use Illuminate\Support\Facades\Route;

Route::get('products-mixes-by-basf/{basf_number}', [ProductMixController::class, 'findProductMixByBasfNumber']);

