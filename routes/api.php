<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware(['auth:sanctum']);
    Route::get('profile', 'profile')->middleware(['auth:sanctum']);
});
Route::apiResource('forms', FormController::class)->middleware(['auth:sanctum', 'admin']);
