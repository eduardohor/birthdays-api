<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->group(function () {
  Route::post('me', [AuthController::class, 'me']);
  Route::post('refresh', [AuthController::class, 'refresh']);
  Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('login', [AuthController::class, 'login']);

Route::apiResource('user', UserController::class);
