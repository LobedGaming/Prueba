<?php


use App\Http\Controllers\BitacoraController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
