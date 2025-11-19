<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login route
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
//logout route
Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->middleware('auth:sanctum');
//company route
Route::get('/company', [App\Http\Controllers\API\CompanyController::class, 'show'])->middleware('auth:sanctum');
