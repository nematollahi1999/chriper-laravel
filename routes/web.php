<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

// First controller then the method "index" inside the controller class
Route::get('/', [ChirpController::class, 'index']);
Route::post('/chirps', [ChirpController::class, 'store']);