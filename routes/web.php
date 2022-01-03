<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\ClientesComponent;
use App\Http\Livewire\DetallePrestamo;
use App\Http\Livewire\EditarPrestamo;
use App\Http\Livewire\HistorialComponent;
use App\Http\Livewire\PrestamosComponent;
use App\Http\Livewire\RegistrarPrestamo;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
//Buscador de la pagina inicio
Route::get('/busqueda/buscar', 'VacanteController@resultados')->name('vacantes.resultados');
Route::post('/busqueda/buscar', 'VacanteController@buscar')->name('vacantes.buscar');


Route::get('resultado', [WelcomeController::class, 'resultados'])->name('buscar.resultados');
Route::post('resultado', [WelcomeController::class, 'buscar'])->name('buscar.resultado');

Route::get('pdfInfo/{id}',[ WelcomeController::class , 'pdfInfo'])->name('info.pdf');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', DashboardController::class)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('clientes', ClientesComponent::class)->name('clientes.index');

Route::middleware(['auth:sanctum', 'verified'])->get('registrar-prestamo', RegistrarPrestamo::class)->name('registrar.prestamo');

Route::middleware(['auth:sanctum', 'verified'])->get('editar-prestamo/{loan}', EditarPrestamo::class)->name('editar.prestamo');

Route::middleware(['auth:sanctum', 'verified'])->get('detalle-prestamo/{loan}', DetallePrestamo::class)->name('detalle.prestamo');

Route::middleware(['auth:sanctum', 'verified'])->get('prestamos', PrestamosComponent::class)->name('prestamos.index');

Route::middleware(['auth:sanctum', 'verified'])->get('historial-prestamos', HistorialComponent::class)->name('historial.index');
