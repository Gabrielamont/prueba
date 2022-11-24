<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\SaleController;

Route::group(['middleware' => ['admin']], function () {
    Route::get('', [HomeController::class, 'index']);

    Route::prefix('product')->group(function () {

        Route::get('/', [ProductController::class, 'index']);
        Route::get('/create', [ProductController::class, 'create'])->name("product_create");
        Route::post('/store', [ProductController::class, 'store'])->name('product_store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name("edit_product");
        Route::put('/update/{id}', [ProductController::class, 'update'])->name("update_product");
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name("delete_product");
    });

    Route::prefix('sales')->group(function () {

        Route::get('/', [SaleController::class, 'index']);

    });

    Route::prefix('bills')->group(function () {

        Route::get('/', [BillController::class, 'index']);
        Route::post('/store', [BillController::class, 'store'])->name('bill_store');
        Route::get('/view/{id}', [BillController::class, 'view'])->name("view_bill");

    });
});


