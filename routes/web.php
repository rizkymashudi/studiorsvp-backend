<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudioScheduleController;
use App\Http\Controllers\Admin\StudioReservationsController;
use App\Http\Controllers\Admin\ReservationHistoryController;
use App\Http\Controllers\Admin\StudioAssetController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CustomerSettingController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('overview', ClientDashboardController::class)->middleware(['auth', 'verified']);
Route::resource('booking', BookingController::class);
Route::resource('reservations-history', HistoryController::class);
Route::resource('profile-settings', CustomerSettingController::class);

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
        Route::resource('schedules', StudioScheduleController::class);
        Route::resource('sub-schedule', StudioSubScheduleController::class);
        Route::resource('reservations', StudioReservationController::class);
        Route::resource('history', ReservationHistoryController::class);
        Route::resource('assets', StudioAssetController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('report', ReportController::class);
        Route::resource('profile', UserProfileController::class);
        Route::resource('setting', SettingsController::class);
        Route::resource('log', ActivityLogController::class);
    });

Auth::routes(['verify' => true]);

