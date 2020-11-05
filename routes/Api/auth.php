<?php

use App\Domains\Auth\Http\Controllers\Api\User\UserController;

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('details', [UserController::class, 'details']);
    });
});
