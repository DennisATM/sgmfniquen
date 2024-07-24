<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/sgm',[LoginController::class,'portalSgm'])
    ->name('login.portalSgm');

Route::get('/loginUser',[LoginController::class,'loginSgm'])
    ->name('login.loginSgm');
