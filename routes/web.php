<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

//register
Route::get('/register',[AuthController::class , 'register'])->name('register');
Route::post('/register',[AuthController::class , 'store']);
//login
Route::get('/login',[AuthController::class , 'login'])->name('login');
Route::post('/login',[AuthController::class , 'authenticate']);
