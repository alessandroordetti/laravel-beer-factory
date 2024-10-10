<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{JWTAuthController, LoginController, IndexController};
use App\Http\Middleware\JwtMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [LoginController::class, 'register'])->name('register-page');
Route::get('login', [LoginController::class, 'login'])->name('login-page');
Route::post('register', [JWTAuthController::class, 'register'])->name('register-user');


Route::middleware([JwtMiddleware::class])->group(function(){
    Route::get('/home', [IndexController::class, 'index'])->name('index');
});
    
    
    
    
    