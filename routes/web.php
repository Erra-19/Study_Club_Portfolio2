<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EasySendController;
use App\Http\Controllers\EasySendDetailController;
use App\Http\Controllers\ESUpdateController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\PickupController;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login']);

Route::get('/EasySend', [EasySendController::class, 'dropdown'])->name('easySendForm');
Route::post('/easysend', [EasySendController::class, 'form'])->name('easysend.form');
Route::post('/EasySend', [EasySendController::class, 'form'])->name('easySendDetail');
Route::get('/EasySendDetail/{id}', [EasySendController::class, 'showEasySendDetail'])->name('easySendDetail.show');

Route::get('/EasySendDetail', [EasySendDetailController::class, 'index'])->name('easysenddetail');

Route::get('/EasySend/update/{id}', [ESUpdateController::class, 'updateform'])->name('EasySendUpdate');
Route::put('/EasySend/update/{id}', [ESUpdatecontroller::class, 'update']);

Route::delete('/easysend/{id}', [ESUpdateController::class, 'delete'])->name('easysend.delete');

Route::get('/tracking',[TrackingController::class, 'index'])->name('tracking.index');
Route::post('/tracking/search', [TrackingController::class, 'search'])->name('tracking.search');

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/admin/search', [PickupController::class, 'searchByReceiptNumber'])->name('admin.search');
Route::post('/admin/search/{receipt_number}', [PickupController::class, 'assignCourier'])->name('admin.assignCourier');