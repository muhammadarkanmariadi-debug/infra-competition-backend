<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Middleware\isSiswa;
use App\Http\Middleware\jewete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;
use Illuminate\Auth\Middleware\Authenticate;
use Tymon\JWTAuth\Facades\JWTAuth;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
    Route::get('/me', 'me');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index');
    Route::get('/blog/{id}-{slug}', 'show');
    Route::middleware([isSiswa::class, isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/blog', 'store');
        Route::put('/blog/{id}', 'update');
        Route::delete('/blog/{id}', 'destroy');
    });
});
