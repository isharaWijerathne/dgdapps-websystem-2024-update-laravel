<?php

use App\Http\Controllers\MarketingManager\Auth\MMLoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MarketingManager\Auth\RegisteredMMController;

Route::middleware('guest:marketing_manager')->group(function () {

    
    Route::get('admin/marketing/create-marketing-manager', [RegisteredMMController::class, 'create'])->name('mm-register');
    Route::post('admin/marketing/create-marketing-manager', [RegisteredMMController::class, 'store'])->name("mm-register-post");

    Route::get('/mm/loging', [MMLoginController::class, 'create'])->name('mm-login');
    Route::post('/mm/loging', [MMLoginController::class, 'store'])->name("mm-login");


});

Route::middleware('auth:marketing_manager')->group(function () {
    

    //Route::post('logout-', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
