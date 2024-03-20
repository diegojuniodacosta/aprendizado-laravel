<?php

use App\Http\Controllers\DiasRepetidosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('consultar-dias-repetidos');
});

Route::get('/consultar-dias-repetidos', [DiasRepetidosController::class, 'index']);

Route::get('/dias-repetidos', [DiasRepetidosController::class, 'show'])
    ->name('diasrepetidos.show');

Route::delete('/dias-deletados/{id}', [DiasRepetidosController::class, 'destroy'])
    ->name('diasdeletados.destroy');
