<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::post('/login', [UserController::class, 'apiLogin']);

    Route::prefix('books')->middleware('auth')->group(function (){
        Route::get('read', [BookController::class, 'readAllBooks']);
        Route::post('create', [BookController::class, 'create']);
        Route::put('update/{id}', [BookController::class, 'update']);
        Route::delete('delete/{id}', [BookController::class, 'delete']);
        Route::get('read/{id}', [BookController::class, 'readABook']);
    });
});