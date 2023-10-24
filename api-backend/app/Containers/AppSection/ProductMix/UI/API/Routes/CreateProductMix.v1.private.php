<?php

use App\Containers\AppSection\ProductMix\UI\API\Controllers\ProductMixController;
use Illuminate\Support\Facades\Route;

Route::post('product-mixes', [ProductMixController::class, 'createProductMix']);
