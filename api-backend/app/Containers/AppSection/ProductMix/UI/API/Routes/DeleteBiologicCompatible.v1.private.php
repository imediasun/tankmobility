<?php

/**
 * @apiGroup           ProductMix
 * @apiName            DeleteBiologicCompatible
 *
 * @api                {DELETE} /v1/biologic-compatible/:id Delete Biologic Compatible
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

use App\Containers\AppSection\ProductMix\UI\API\Controllers\BiologicCompatibleController;
use Illuminate\Support\Facades\Route;

Route::delete('biologic-compatible/{id}', [BiologicCompatibleController::class, 'deleteBiologicCompatible']);
