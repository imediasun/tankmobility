<?php

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('me', [Controller::class, 'getMyUser'])
        ->name('panel_api_get_my_user')->middleware(['api']);

Route::get('menu', [Controller::class, 'getMenu'])
    ->name('panel_api_get_menu')->middleware(['api']);

