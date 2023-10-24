<?php

/**
 * @apiGroup           TestOrder
 * @apiName            FindTestOrderById
 *
 * @api                {GET} /v1/test-orders/:id Find Test Order By Id
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

Route::get('test-orders/{id}', [TestOrderController::class, 'findTestOrderById']);

