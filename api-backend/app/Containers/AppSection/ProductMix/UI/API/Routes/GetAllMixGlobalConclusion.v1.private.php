<?php

/**
 * @apiGroup           ProductMix
 * @apiName            GetAllMixGlobalConclusion
 *
 * @api                {GET} /v1/mix-global-conclusion Get All Mix Global Conclusion
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

use App\Containers\AppSection\ProductMix\UI\API\Controllers\MixGlobalConclusionController;
use Illuminate\Support\Facades\Route;

Route::get('mix-global-conclusion', [MixGlobalConclusionController::class, 'getAllMixGlobalConclusion']);
