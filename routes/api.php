<?php

use App\Http\Controllers\V1\CitizenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {

    Route::prefix('human-resources')->group(function () {

        Route::prefix('citizens')->group(function () {

            Route::get('{citizen}', [CitizenController::class, 'show']);
            // Route::post('/', [CitizenController::class, 'store']);
            // Route::put('{citizen}', [CitizenController::class, 'update']);
            // Route::delete('{citizen}', [CitizenController::class, 'destroy']);
        });
    });
});
