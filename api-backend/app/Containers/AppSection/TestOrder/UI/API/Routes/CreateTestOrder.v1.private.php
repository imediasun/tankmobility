<?php

use App\Containers\AppSection\TestOrder\UI\API\Controllers\TestOrderController;
use Illuminate\Support\Facades\Route;

Route::post('test-orders', [TestOrderController::class, 'createTestOrder']);

