<?php

use App\Http\Controllers\Customer\ConversionController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\TestApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CustomerController::class,'index'])->name('home');

Route::middleware('auth')->group(function () {
    # Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('customer.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('customer.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('customer.profile.destroy');

    # Conversion
    Route::get('/profile/conversions', [ConversionController::class, 'index'])->name('customer.conversions.index');
    Route::get('/conversions/create', [ConversionController::class, 'create'])->middleware('credit')->name('customer.conversions.create');
    Route::post('/conversions', [ConversionController::class, 'store'])->middleware('credit')->name('customer.conversions.store');
    Route::put('/conversions/{id}', [ConversionController::class, 'update'])->name('customer.conversions.update');
    Route::delete('/conversions/{id}', [ConversionController::class, 'destroy'])->name('customer.conversions.destroy');

});

Route::get('/test-api', [TestApiController::class,'index'])->name('test-api');
Route::get('/denemee', function() {
    dd(123);
});

require __DIR__.'/admin-auth.php';
require __DIR__.'/customer-auth.php';
