<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/change/{product}', [\App\Http\Controllers\ProductController::class, 'change'])->name('product.change');
    Route::post('/product/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::get('/order/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
    Route::post('/order/store', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('/order/show/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
});

require __DIR__.'/auth.php';
