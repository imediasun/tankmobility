<?php

use App\Containers\AppSection\Authentication\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('login', [Controller::class, 'login'])
    ->name('devel_api_login');
