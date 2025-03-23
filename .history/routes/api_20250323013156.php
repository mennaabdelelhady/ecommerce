<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/stripe/webhook', OrderManager::class,'webhookStripe');{
    return $request->user();
})->middleware('auth:sanctum');
