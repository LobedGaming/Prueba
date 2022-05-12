<?php

<<<<<<< HEAD
use App\Http\Controllers\PatientController;
=======

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\DoctorController;
>>>>>>> df6a1dfc6e7460a586b2d2ba43b117b48e2b2f95
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
    return view('welcome');
});

<<<<<<< HEAD
Route::get('patient/index', [PatientController::class, 'index'])->name('index');
=======
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bitacora',[BitacoraController::class, 'index']);
Route::resource('doctors', DoctorController::class)->names('doctors');

>>>>>>> df6a1dfc6e7460a586b2d2ba43b117b48e2b2f95
