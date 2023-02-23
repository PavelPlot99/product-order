<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/orders/index', [\App\Http\Controllers\Api\OrderController::class, 'index'])->name('api.order.index');
    Route::get('/orders/{order}', [\App\Http\Controllers\Api\OrderController::class, 'show'])->name('api.order.show');
    Route::post('/orders/store', [\App\Http\Controllers\Api\OrderController::class, 'store'])->name('api.order.store');
    Route::patch('/orders/update/{order}', [\App\Http\Controllers\Api\OrderController::class, 'update'])->name('api.order.update');
    Route::delete('/orders/{order}', [\App\Http\Controllers\Api\OrderController::class, 'destroy'])->name('api.order.destroy');
});


