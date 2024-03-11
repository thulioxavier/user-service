<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-user', [UserController::class, 'findAll']);
Route::get('/create-user', [UserController::class, 'findById']);
Route::get('/create-user', [UserController::class, 'update']);
Route::get('/create-user', [UserController::class, 'delete']);
Route::get('/create-user', [UserController::class, 'create']);
