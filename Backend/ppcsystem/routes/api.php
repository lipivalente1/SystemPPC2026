<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpcsController;
use App\Http\Controllers\FaculdadesController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\PpcsCriadosController;
use App\Http\Controllers\ProcessosFaculTecController;
use App\Http\Controllers\ProcessosTecCamaraController;




Route::get('/ppcs', [PpcsController::class, 'index']);
Route::post('/ppcs', [PpcsController::class, 'store']);
Route::get('/ppcs/{id}', [PpcsController::class, 'show']);
Route::put('/ppcs/{id}', [PpcsController::class, 'update']);
Route::delete('/ppcs/{id}', [PpcsController::class, 'destroy']);

Route::get('/faculdades', [FaculdadesController::class, 'index']);
Route::post('/faculdades', [FaculdadesController::class, 'store']);
Route::get('/faculdades/{id}', [FaculdadesController::class, 'show']);
Route::put('/faculdades/{id}', [FaculdadesController::class, 'update']);
Route::delete('/faculdades/{id}', [FaculdadesController::class, 'destroy']);

Route::get('/tecnicos', [TecnicosController::class, 'index']);
Route::post('/tecnicos', [TecnicosController::class, 'store']);
Route::get('/tecnicos/{id}', [TecnicosController::class, 'show']);
Route::put('/tecnicos/{id}', [TecnicosController::class, 'update']);
Route::delete('/tecnicos/{id}', [TecnicosController::class, 'destroy']);

//Route::get('/ppcs/criados/all', [PpcsCriadosController::class, 'all']);
//Route::get('/ppcs-criados', [PpcsCriadosController::class, 'index']);
//Route::post('/ppcs-criados', [PpcsCriadosController::class, 'store']);
//Route::get('/ppcs-criados/{id}', [PpcsCriadosController::class, 'show']);
//Route::put('/ppcs-criados/{id}', [PpcsCriadosController::class, 'update']);
//Route::delete('/ppcs-criados/{id}', [PpcsCriadosController::class, 'destroy']);

Route::get('/analise-ppcs', [ProcessosFaculTecController::class, 'index']);
Route::post('/analise-ppcs', [ProcessosFaculTecController::class, 'store']);
Route::get('/analise-ppcs/{id}', [ProcessosFaculTecController::class, 'show']);
Route::put('/analise-ppcs/{id}', [ProcessosFaculTecController::class, 'update']);
Route::delete('/analise-ppcs/{id}', [ProcessosFaculTecController::class, 'destroy']);

Route::get('/camara-ppcs', [ProcessosTecCamaraController::class, 'index']);
Route::post('/camara-ppcs', [ProcessosTecCamaraController::class, 'store']);
Route::get('/camara-ppcs/{id}', [ProcessosTecCamaraController::class, 'show']);
Route::put('/camara-ppcs/{id}', [ProcessosTecCamaraController::class, 'update']);
Route::delete('/camara-ppcs/{id}', [ProcessosTecCamaraController::class, 'destroy']);
