<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{JWTAuthController, LoginController};
use App\Http\Controllers\Auth\{IndexController, BreweryController};
use App\Http\Middleware\JwtMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('register', [LoginController::class, 'register'])->name('register-page');
Route::get('login', [LoginController::class, 'login'])->name('login-page');
Route::post('register', [JWTAuthController::class, 'register'])->name('register-user');
Route::post('login', [JWTAuthController::class, 'login'])->name('login-user');


//Rotte per gli utenti autenticati tramite jwt-token
Route::middleware([JwtMiddleware::class])->group(function(){
    Route::get('/home', [IndexController::class, 'index'])->name('index');
});
    
    
    
    
    