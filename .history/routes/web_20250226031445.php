<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/login', 'App\Http\Controllers\AuthManager@login')->name("login");
Route::post('/login', 'App\Http\Controllers\AuthManager@loginPost')->name("loginPost");
Route::get('/register', 'App\Http\Controllers\AuthManager@register')->name("register");
Route::post('/register', 'App\Http\Controllers\AuthManager@registerPost')->name("registerPost");
