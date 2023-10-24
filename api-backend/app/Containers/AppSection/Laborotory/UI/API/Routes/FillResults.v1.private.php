<?php

use App\Containers\AppSection\Laborotory\UI\API\Controllers\LaborotoryController;
use Illuminate\Support\Facades\Route;

Route::post('/fill-results', [LaborotoryController::class, 'fillResults'])
    ->middleware(['auth:api']);

