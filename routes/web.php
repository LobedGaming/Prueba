<?php


use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SecretarioController;
use App\Http\Controllers\PatientController;
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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/personalizar', 'personalizar')->name('personalizar');
Route::resource('/citas',CitasController::class)->names('citas');
Route::get('/citas/doctor/{id}',[CitasController::class, 'citasDoctor']);
Route::get('/citas/paciente/{id}',[CitasController::class, 'citasPaciente']);
Route::post('/citas/doctor',[CitasController::class,'citasDoctor'])->name('citas.citasDoctor');
Route::get('/bitacora',[BitacoraController::class, 'index']);
Route::resource('doctors', DoctorController::class)->names('doctors');
Route::resource('secretario', SecretarioController::class)->names('secretario');
Route::resource('patient', PatientController::class)->names('patient');