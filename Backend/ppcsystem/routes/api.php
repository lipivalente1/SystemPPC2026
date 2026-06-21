<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpcController;

Route::get('/ppc', [PpcController::class, 'index']);
Route::post('/ppc', [PpcController::class, 'store']);
Route::get('/ppc/{id}', [PpcController::class, 'show']);
Route::put('/ppc/{id}', [PpcController::class, 'update']);
Route::delete('/ppc/{id}', [PpcController::class, 'destroy']);