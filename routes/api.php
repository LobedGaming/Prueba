<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitasController;

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
Route::post('/auth/register', [UserController::class, 'register']);
Route::post('/auth/login', [UserController::class, 'login']);
Route::get('/citas/paciente/{id}',[CitasController::class, 'citasPacienteApi'])->name('citas.citasPacienteApi');

Route::get('/citas/recetas/{idCita}', [CitasController::class, 'getRecetaCita']);
Route::get('/citas/{id}', [CitasController::class, 'getAllCitas']);
Route::get('/recetas/{id}', [CitasController::class, 'getAllRecetas']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
