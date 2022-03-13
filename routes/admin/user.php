<?php

use App\Http\Controllers\General\UserController;

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'
], function () {
    Route::resource('user', UserController::class);
});
