<?php

use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/create-user', [ClientController::class, 'findById']);
// Route::get('/create-user', [ClientController::class, 'update']);
// Route::get('/create-user', [ClientController::class, 'delete']);
Route::get('/find/clients', [ClientController::class, 'findAll'])->name('clients.findAll');
Route::get('/create/client', [ClientController::class, 'create'])->name('clent.create');
Route::post('/create/store', [ClientController::class, 'store'])->name('client.store');
