<?php

use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\SimuladorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(array('prefix' => 'v1'), function()
{
    Route::get('/', function () {
        return response()->json(['code' => 200, 'status' => 'Sucesso', 'message' => 'Conectado na API Simulador']);
    });
    Route::get('/instituicoes', [InstituicaoController::class, 'index']);
    Route::get('/convenios', [ConvenioController::class, 'index']);
    Route::post('/simulador', [SimuladorController::class, 'simulador']);
});

Route::fallback(function() {
    return response()->json(['code' => 404, 'status' => 'Não encontrado.', 'message' => 'Ops... página ou recurso não encontrado.'], 404);
});
