<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudioScheduleController;
use App\Http\Controllers\Admin\StudioReservationsController;
use App\Http\Controllers\Admin\ReservationHistoryController;
use App\Http\Controllers\Admin\StudioAssetController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ReportController;



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

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function(){
        Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
        Route::resource('schedules', StudioScheduleController::class);
        Route::resource('reservations', StudioReservationController::class);
        Route::resource('history', ReservationHistoryController::class);
        Route::resource('assets', StudioAssetController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('report', ReportController::class);
    });