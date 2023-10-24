<?php

/**
 * @apiGroup           User
 * @apiName            GetAllUsers
 * @api                {get} /v1/users Get All Users
 * @apiDescription     Get All Application Users (clients and admins). For all registered users "Clients" only you
 *                     can use `/clients`. And for all "Admins" only you can use `/admins`.
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => 'list-users', 'roles' => ''] | Resource Owner
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiUse             GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\GetAllUsersController;
use Illuminate\Support\Facades\Route;
use App\Containers\AppSection\User\Mail\SendEmailTest;
use App\Containers\AppSection\User\Jobs\DemoJob;
use Illuminate\Support\Facades\Mail;

Route::get('users', [GetAllUsersController::class, 'getAllUsers']);

Route::get('email-test', function(){
    $details['email'] = 'your_email@gmail.com';
    $email = new SendEmailTest();
    Mail::to($details['email'])->send($email);
    dispatch(new DemoJob($details));
});

Route::get('users/autocomplete/{match?}', [GetAllUsersController::class, 'getUserAutocomplete'])
    ->name('panel_api_get_autocomplete_users')->middleware(['auth:api']);
