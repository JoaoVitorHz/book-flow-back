<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\UserController;
use  App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'user'], function () {
    Route::get('/getAll', [UserController::class, 'GetAllUser']);
    Route::get('/{id}', [UserController::class, 'GetUser']);
    Route::post('create', [UserController::class, 'CreateUser']);
    Route::post('login', [UserController::class, 'Login']);
    Route::put('update/{id}', [UserController::class, 'UpdateUser']);
    Route::delete('{id}', [UserController::class, 'DeleteUser']);
});

Route::group(['prefix' => 'book'], function () {
    Route::get('/getAll', [BookController::class, 'GetAllBook']);
    Route::get('/{id}', [BookController::class, 'GetBook']);
    Route::post('create', [BookController::class, 'CreateBook']);
    Route::post('login', [BookController::class, 'Login']);
    Route::put('update/{id}', [BookController::class, 'UpdateBook']);
    Route::delete('{id}', [BookController::class, 'DeleteBook']);
});