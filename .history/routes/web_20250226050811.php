<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductsManager;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\ProductsManager::class, "index"])->name("home");

Route::get("login", [AuthManager::class,"login"])->name("login");
Route::get("logout", [AuthManager::class,"logout"])->name("logout");
Route::post("login", [AuthManager::class,"loginPost"])->name("loginPost");
Route::get("register", [AuthManager::class,"register"])->name("register");
Route::post("register", [AuthManager::class,"registerPost"])->name("registerPost");
