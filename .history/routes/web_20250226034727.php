<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/login', [AuthManager::class],"login")->name("login");
Route::post('/login', [AuthManager::class],"loginPost")->name("loginPost");
Route::get('/register', [AuthManager::class],"register")->name("register");
Route::post('/register', [AuthManager::class],"registerPost")->name("registerPost");
