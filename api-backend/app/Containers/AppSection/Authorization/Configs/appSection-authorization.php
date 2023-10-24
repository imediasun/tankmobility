<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AppSection Section Authorization Container
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Admin Role
    |--------------------------------------------------------------------------
    |
    | This role is used across the app as the main authority e.g. super admin role
    |
    */

    'basf_admin_role' => env('ADMIN_ROLE', 'admin'),
    'basf_country_admin_role' => env('COUNTRY_ADMIN_ROLE', 'country_admin'),
    'lab_owner_role' => env('LAB_OWNER_ROLE', 'lab_owner'),
    'basf_user_role' => env('BASF_USER_ROLE', 'basf_user'),
];
