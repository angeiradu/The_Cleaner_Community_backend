<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CleanerController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookedCleanerController;


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

Route::get('schedules', [ScheduleController::class, 'index']);
Route::post('schedules', [ScheduleController::class, 'store']);
Route::get('schedules/{id}', [ScheduleController::class, 'show']);
Route::put('schedules/{id}', [ScheduleController::class, 'update']);
Route::delete('schedules/{id}', [ScheduleController::class, 'destroy']);


Route::get('booked-cleaners', [BookedCleanerController::class, 'index']);
Route::post('booked-cleaners', [BookedCleanerController::class, 'store']);
Route::get('booked-cleaners/{id}', [BookedCleanerController::class, 'show']);
Route::put('booked-cleaners/{id}', [BookedCleanerController::class, 'update']);
Route::delete('booked-cleaners/{id}', [BookedCleanerController::class, 'destroy']);
