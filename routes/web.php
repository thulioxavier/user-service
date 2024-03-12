<?php

use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::delete('/client/destroy/{id}', [ClientController::class, 'destroy'])->name(('client.destroy'));
Route::put('/client/update/{id}', [ClientController::class, 'update'])->name(('client.update'));
Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name(('client.edit'));
Route::get('/client/show/{id}', [ClientController::class, 'show'])->name('client.show');
Route::get('/clients/find', [ClientController::class, 'findAll'])->name('clients.findAll');
Route::get('/client/create', [ClientController::class, 'create'])->name('clent.create');
Route::post('/client/create/store', [ClientController::class, 'store'])->name('client.store');
