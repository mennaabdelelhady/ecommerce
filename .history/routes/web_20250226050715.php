<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\ProductsManager::class, "index"], function () {
    return view('products');
})->name("home");

Route::get("login", [AuthManager::class,"login"])->name("login");
Route::get("logout", [AuthManager::class,"logout"])->name("logout");
Route::post("login", [AuthManager::class,"loginPost"])->name("loginPost");
Route::get("register", [AuthManager::class,"register"])->name("register");
Route::post("register", [AuthManager::class,"registerPost"])->name("registerPost");
