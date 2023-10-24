<?php

/**
 * @apiGroup           TestOrder
 * @apiName            UpdateTestOrder
 *
 * @api                {PATCH} /v1/test-orders/:id Update Test Order
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

use App\Containers\AppSection\TestOrder\UI\API\Controllers\TestOrderController;
use Illuminate\Support\Facades\Route;

Route::patch('test-orders/{id}', [TestOrderController::class, 'updateTestOrder'])
    ->middleware(['auth:api']);

