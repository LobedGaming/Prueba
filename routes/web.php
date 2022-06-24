<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SecretarioController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HistoricoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    if (Auth::check()) {
       return view('home');
    }else{
    return view('auth.login');
    }
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::view('/personalizar', 'personalizar')->name('personalizar');
Route::view('/Personalizar-Reporte', 'personalizar-reporte')->name('personalizar-reporte');

Route::get('/citas/paciente/{id}',[CitasController::class, 'citasPaciente'])->name('citas.citasPaciente');
Route::get('/citas/doctor/{id}',[CitasController::class,'citasDoctor'])->name('citas.citasDoctor');
Route::get('/bitacora',[BitacoraController::class, 'index']);
Route::resource('citas', CitasController::class)->names('citas');
Route::resource('doctors', DoctorController::class)->names('doctors');
Route::resource('secretario', SecretarioController::class)->names('secretario');
Route::resource('patient', PatientController::class)->names('patient');
Route::resource('admin', AdminController::class)->names('admin');
Route::resource('receta', RecetaController::class)->names('receta');
Route::get('/receta/create/{id}', [RecetaController::class, 'createCita'])->name('receta.createCita');
Route::resource('historico', HistoricoController::class)->names('historico');
