<?php

/**
 * @apiGroup           ProductMix
 * @apiName            FindMixPhysicalAspectsById
 *
 * @api                {GET} /v1/mix-physical-aspects/:id Find Mix Physical Aspects By Id
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

use App\Containers\AppSection\ProductMix\UI\API\Controllers\MixPhysicalAspectsController;
use Illuminate\Support\Facades\Route;

Route::get('mix-physical-aspects/{id}', [MixPhysicalAspectsController::class, 'findMixPhysicalAspectsById']);
