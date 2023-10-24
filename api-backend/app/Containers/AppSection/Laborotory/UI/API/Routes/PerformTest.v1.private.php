<?php


use App\Containers\AppSection\Laborotory\UI\API\Controllers\LaborotoryController;
use Illuminate\Support\Facades\Route;

Route::post('perform-test/{test_id}', [LaborotoryController::class, 'performTest']);

