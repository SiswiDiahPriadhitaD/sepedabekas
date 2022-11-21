<?php

use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;

use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\Customer\TransactionController as CustomerTransactionController;

use App\Http\Controllers\HomeController;

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

Route::controller(CustomerHomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'index');
    Route::get('/product/{id}/show', 'show');
    Route::get('/product/{id}/brand', 'showbybrand');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminHomeController::class)->group(function () {
            Route::get('home', 'index');
            Route::put('update_profile', 'update_profile');
            Route::get('change_password', 'change_password');
            Route::put('update_password', 'update_password');
        });

        Route::controller(AdminTransactionController::class)->group(function () {
            Route::get('transaction', 'index');
            Route::get('transaction/{id}/show', 'show');
            Route::get('transaction/{id}/unpaid', 'unpaid');
        });

        Route::controller(AdminPaymentController::class)->group(function () {
            Route::get('payment', 'index');
            Route::get('payment/{id}/show', 'show');
            Route::put('payment/{id}', 'update');
            Route::get('payment/export', 'export');
        });

        Route::resource('brand', AdminBrandController::class);
        Route::resource('type', AdminTypeController::class);
        Route::resource('product', AdminProductController::class);
        Route::resource('user', AdminUserController::class);
    });
});
