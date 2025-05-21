<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CarController;

Route::get('/', [HomeController::class, 'index']);
