<?php

use App\Http\Controllers\UserController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register']);
Route::post('/signin', [UserController::class, 'signin']);
Route::post('/signup', [UserController::class, 'signup']);


Route::prefix('/tech-champions')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('books', function (){
        $books = Book::get();
        return view('manage-books', ['books' => $books]);
    });
    Route::get('books/{userId}', [\App\Http\Controllers\AdminController::class, 'getUser']);
});
