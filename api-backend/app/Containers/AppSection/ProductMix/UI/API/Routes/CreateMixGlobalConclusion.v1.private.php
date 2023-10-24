<?php

/**
 * @apiGroup           ProductMix
 * @apiName            CreateMixGlobalConclusion
 *
 * @api                {POST} /v1/mix-global-conclusion Create Mix Global Conclusion
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

Route::post('mix-global-conclusion', [MixGlobalConclusionController::class, 'createMixGlobalConclusion']);
