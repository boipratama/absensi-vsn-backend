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
//attendance checkin route
Route::post('/checkin', [App\Http\Controllers\API\AttendaceController::class, 'checkin'])->middleware('auth:sanctum');
//attendance checkout route
Route::post('/checkout', [App\Http\Controllers\API\AttendaceController::class, 'checkout'])->middleware('auth:sanctum');
//is checked in route
Route::get('/is-checkin', [App\Http\Controllers\API\AttendaceController::class, 'isCheckedin'])->middleware('auth:sanctum');
//update profile route
Route::post('/update-profile', [App\Http\Controllers\API\AuthController::class, 'updateProfile'])->middleware('auth:sanctum');
//create permission
Route::apiResource('/api-permissions', App\Http\Controllers\API\PermissionController::class)->middleware('auth:sanctum');
//notes routes
Route::apiResource('/api-notes', App\Http\Controllers\API\NoteController::class)->middleware('auth:sanctum');
