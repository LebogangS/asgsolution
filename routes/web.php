<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrencyController;

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

//Authentication Routes
Route::get('/', [AuthController::class, 'home']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('signing-in', [AuthController::class, 'login'])->name('sign.in');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('registering', [AuthController::class, 'registering'])->name('registering');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

/**
 * Currency Routes
 * Can only be accessed when user is logged in
 */
Route::middleware(['auth'])->group(function () {
    Route::get('currencies', [CurrencyController::class, 'index'])->name('currencies');
    Route::get('add-currency', [CurrencyController::class, 'addCurrency'])->name('add-currency');
    Route::post('adding-currency', [CurrencyController::class, 'addingCurrency'])->name('adding-currency');
    Route::get('show/{id}', [CurrencyController::class, 'show'])->name('currencies.show');
    Route::get('edit/{id}', [CurrencyController::class, 'edit'])->name('currencies.edit');
    Route::get('update/{id}', [CurrencyController::class, 'update'])->name('currencies.update');
    Route::get('delete/{id}', [CurrencyController::class, 'destroy'])->name('currencies.delete');
});
