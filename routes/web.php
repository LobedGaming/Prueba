<?php


use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SecretarioController;
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
Route::get('/', function () {
    return "Page not found :(";
});
Route::resource('/citas',CitasController::class)->names('citas');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bitacora',[BitacoraController::class, 'index']);
Route::resource('doctors', DoctorController::class)->names('doctors');
Route::controller(SecretarioController::class)->group(function(){
    Route::get('/secretario','index')->name('secretario.index');
    Route::get('/secretario/create','create')->name('secretario.create');
    Route::post('/secretario/store','store')->name('secretario.store');
    Route::delete('/secretario/{secretario}','destroy')->name('secretario.destroy');
    Route::get('/secretario/{secretario}/edit','edit')->name('secretario.edit');
    Route::put('/secretario/{secretario}/update','update')->name('secretario.update');
    Route::get('/secretario/{secretario}/show','show')->name('secretario.show');
});
