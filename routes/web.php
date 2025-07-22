<?php

use App\Http\Controllers\AuthController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


Route::get(uri: '/', action: function () {
    return view(view: 'welcome');
});
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

Route::post('/register', [AuthController::class], 'register')->name('register');
Route::post('/login', [AuthController::class], 'login')->name('login');
