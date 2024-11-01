<?php

use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function(){
    Route::get('/users','index');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index');
});

Route::controller(MemberController::class)->group(function(){
    Route::get('/members','index');
    Route::get('/member/{id}','show');
});