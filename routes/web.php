<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductListController;
use App\Http\Controllers\Api\UserBasketController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::get('/users', [UserController::class,'index']);
    Route::get('/users/{id}', [UserController::class,'show']);
    Route::get('/categories', [CategoryController::class,'index']);
    Route::get('/category/{id}', [CategoryController::class,'show']);
    Route::get('/baskets', [UserBasketController::class,'index']);
    Route::get('/basket/{id}', [UserBasketController::class,'show']);
    Route::get('/lists', [ProductListController::class,'index']);
    Route::get('/list/{id}', [ProductListController::class,'show']);
});
