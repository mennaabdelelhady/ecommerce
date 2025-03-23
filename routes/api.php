<?php

use Illuminate\Http\Request;
use App\Http\Controllers\OrderManager;
use Illuminate\Support\Facades\Route;

Route::any('/stripe/webhook',
 [OrderManager::class,'webhookStripe']);
