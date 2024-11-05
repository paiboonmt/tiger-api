<?php

use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\NationalityController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderDetailController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TimeLogController;
use App\Http\Controllers\Api\TotalController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function(){
    Route::get('/users','index');
    Route::get('/users/{id}','show');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index');
    Route::get('/products/{id}','show');
});

Route::controller(MemberController::class)->group(function(){
    Route::get('/members','index');
    Route::get('/countCustomer','countCustomer');
    Route::get('/members/{id}','show');
});

Route::controller(OrderController::class)->group(function(){
    Route::get('/orders','index');
    Route::get('/sumOrders','sumOrders');
    Route::get('/countProducts','countProducts');
    Route::get('/sumOrders/{id}','show');
});

Route::controller(OrderDetailController::class)->group(function(){
    Route::get('/order_details','index');
    Route::get('/order_details/{id}','show');
});

Route::controller(NationalityController::class)->group(function(){
    Route::get('/nationality','index');
    Route::get('/nationality/{id}','show');
});

Route::controller(PackageController::class)->group(function(){
    Route::get('/packages','index');
    Route::get('/packages/{id}','show');
});

Route::controller(PaymentController::class)->group(function(){
    Route::get('/payments','index');
    Route::get('/countPayment','countPayment');
    Route::get('/payments/{id}','show');
});

Route::controller(TimeLogController::class)->group(function(){
    Route::get('/timelogs','index');
    Route::get('/timelogs/{id}','show');
});

Route::controller(TotalController::class)->group(function(){
    Route::get('/totals','index');
    Route::get('/totals/{id}','show');
});