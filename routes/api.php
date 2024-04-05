<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\BasketController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix'=>'auth'],function (){
    Route::post('login',[AuthController::class,'login']);
});

Route::group(['prefix'=>'users'],function (){
    Route::post('/',[UserController::class,'store'])->middleware(['auth:sanctum','isAdmin']);
    Route::get('/',[UserController::class,'index'])->middleware(['auth:sanctum','isAdmin']);
    Route::get('/{id}',[UserController::class,'show'])->middleware(['auth:sanctum','isAdmin']);
    Route::put('/{id}',[UserController::class,'update'])->middleware(['auth:sanctum','isAdmin']);
    Route::delete('/{id}',[UserController::class,'destroy'])->middleware(['auth:sanctum','isAdmin']);
});

Route::group(['prefix'=>'products'],function (){
    Route::post('/',[ProductController::class,'store'])->middleware(['auth:sanctum','isAdmin']);
    Route::get('/',[ProductController::class,'index'])->middleware(['auth:sanctum']);
    Route::put('/{id}',[ProductController::class,'update'])->middleware(['auth:sanctum','isAdmin']);
    Route::delete('/{id}',[ProductController::class,'destroy'])->middleware(['auth:sanctum','isAdmin']);
});
Route::group(['prefix'=>'baskets'],function (){
    Route::post('/',[BasketController::class,'store'])->middleware(['auth:sanctum']);
    Route::get('/',[BasketController::class,'index'])->middleware(['auth:sanctum','isAdmin']);
    Route::get('/{id}',[BasketController::class,'show'])->middleware(['auth:sanctum']);
    Route::put('/{id}',[BasketController::class,'update'])->middleware(['auth:sanctum']);
    Route::delete('/{id}',[BasketController::class,'destroy'])->middleware(['auth:sanctum']);
});

Route::group(['prefix'=>'categories'],function (){
    Route::post('/',[CategoryController::class,'store'])->middleware(['auth:sanctum','isAdmin']);
    Route::get('/',[CategoryController::class,'index'])->middleware(['auth:sanctum']);
    Route::get('/{id}',[CategoryController::class,'show'])->middleware(['auth:sanctum']);
    Route::put('/{id}',[CategoryController::class,'update'])->middleware(['auth:sanctum','isAdmin']);
    Route::delete('/{id}',[CategoryController::class,'destroy'])->middleware(['auth:sanctum','isAdmin']);
});
