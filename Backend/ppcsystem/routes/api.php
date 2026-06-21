<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpcsController;

Route::get('/ppcs', [PpcsController::class, 'index']);
Route::post('/ppcs', [PpcsController::class, 'store']);
Route::get('/ppcs/{id}', [PpcsController::class, 'show']);
Route::put('/ppcs/{id}', [PpcsController::class, 'update']);
Route::delete('/ppcs/{id}', [PpcsController::class, 'destroy']);