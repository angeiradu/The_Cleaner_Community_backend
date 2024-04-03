<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CleanerController;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout',[LoginController::class,'logout'])
  ->middleware('auth:sanctum');
Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [ResetPasswordController::class, 'reset']);
Route::get('users', [LoginController::class, 'getUsers']);
Route::put('users/{id}', [LoginController::class, 'updateUser']);
Route::delete('users/{id}', [LoginController::class, 'deleteUser']);
Route::apiResource('cleaners', CleanerController::class);
