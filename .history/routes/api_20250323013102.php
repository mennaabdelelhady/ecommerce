<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/stripe/webhook', OrderManager::class{
    return $request->user();
})->middleware('auth:sanctum');
