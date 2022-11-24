<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;

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
    return view('login');
})->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');

Route::post('auth', [LoginController::class, 'login'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('registerUser', [UserController::class, 'registerUser'])->name('registerUser');

Route::group(['middleware' => ['client']], function () {
    Route::prefix('purchases')->group(function () {

        Route::get('/', [PurchaseController::class, 'index']);
        Route::put('/update/{id}', [PurchaseController::class, 'purchase'])->name("purchase_product");
    });
});

