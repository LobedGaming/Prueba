<?php


use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SecretarioController;
use App\Models\Secretarie;
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

Route::view('/personalizar', 'personalizar')->name('personalizar');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/bitacora',[BitacoraController::class, 'index']);


Route::get('/', function () {
    // return view('welcome');
    return "Page not found :(";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(SecretarioController::class)->group(function(){
    Route::get('/secretario','index')->name('secretario.index');
    Route::get('/secretario/create','create')->name('secretario.create');
    Route::post('/secretario/store','store')->name('secretario.store');
    Route::delete('/secretario/{secretario}','destroy')->name('secretario.destroy');
    Route::get('/secretario/{secretario}/edit','edit')->name('secretario.edit');
    Route::put('/secretario/{secretario}/update','update')->name('secretario.update');
    Route::get('/secretario/{secretario}/show','show')->name('secretario.show');
});
Route::controller(PatientController::class)->group(function(){
    Route::get('/patient','index')->name('patient.index');
    Route::get('/patient/create','create')->name('patient.create');
    Route::post('/patient/store','store')->name('patient.store');
    Route::delete('/patient/{patient}','destroy')->name('patient.destroy');
    Route::get('/patient/{patient}/edit','edit')->name('patient.edit');
    Route::put('/patient/{patient}/update','update')->name('patient.update');
    Route::get('/patient/{patient}/show','show')->name('patient.show');
});