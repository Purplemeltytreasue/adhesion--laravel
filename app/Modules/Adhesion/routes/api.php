<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Adhesion\Http\Controllers\AdhesionController;

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'api/adhesions'
], function ($router) {
    Route::get('/', [AdhesionController::class, 'index']);
    Route::get('/{id}', [AdhesionController::class, 'get']);
    Route::post('/create', [AdhesionController::class, 'create']);
    Route::post('/update', [AdhesionController::class, 'update']);
    Route::post('/delete', [AdhesionController::class, 'delete']);


});
