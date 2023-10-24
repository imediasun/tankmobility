<?php

use App\Containers\AppSection\Authentication\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

// http://api.apiato.test
Route::get('/test', [Controller::class, 'apiRoot'])
    ->name('api_welcome_test_root_page');
