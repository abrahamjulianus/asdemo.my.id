<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\WebcamController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('logbook')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('changepass', [LoginController::class, 'changepass'])->name('changepass')->middleware('auth');
    Route::post('changepass/action', [LoginController::class, 'actionchangepass'])->name('actionchangepass')->middleware('auth');
    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
    Route::get('report', [ReportController::class, 'index'])->name('report')->middleware('auth');

    //REGISTER
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
    Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

    //CHECKIN
    Route::get('checkin', [CheckinController::class, 'index'])->name('checkin');
    Route::post('checkin/action', [CheckinController::class, 'actioncheckin'])->name('actioncheckin');

    //CHECKOUT
    Route::get('checkoutlist', [CheckoutController::class, 'index'])->name('checkoutlist');
    Route::get('checkout/{id}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('checkout/action', [CheckoutController::class, 'actioncheckout'])->name('actioncheckout');
});    

Route::prefix('tutor')->group(function () {
    Route::get('webcam', [WebcamController::class, 'index']);
    Route::post('webcam', [WebcamController::class, 'store'])->name('webcam.capture');
});