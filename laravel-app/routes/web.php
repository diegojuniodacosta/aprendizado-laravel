<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DiasRepetidosController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

// Rotas para testar observer clients
Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('dashboard', [ClientController::class, 'dashboard']);
Route::get('dashboard-edit', [ClientController::class, 'dashboardEdit']);

// Rotas para testar Observer Carros

Route::get('/carros', [CarController::class, 'index'])
    ->name('carros.index');

Route::get('carros-create', [CarController::class, 'create'])
    ->name('carros.create');

Route::post('carros-store', [CarController::class, 'store'])
    ->name('carros.store');

Route::get('carros-edit/{car}', [CarController::class, 'edit'])
    ->name('carros.edit');

Route::put('carros-update/{car}', [CarController::class, 'update'])
    ->name('carros.update');

Route::delete('carros/{car}', [CarController::class, 'destroy'])
    ->name('carros.destroy');
