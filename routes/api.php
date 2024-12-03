<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use APp\
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/users', [AuthApiController::class, 'store']);


Route::post('/login', [AuthApiController::class, 'auth_login']);
Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:api');
Route::get('/me', [AuthApiController::class, 'me'])->middleware('auth:api');
