<?php

use App\Http\Controllers\ComercioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionController;
use App\Http\Requests\GuardarTransaccionRequest;
/*
|--------------------------------------------------------------------------
| Web Routes — TaskBoard (Pasarela de Pagos)
|--------------------------------------------------------------------------
| Semana 5 · Routing y Controladores
|
| Cada ruta conecta una URL + verbo HTTP con una acción del controlador.
| El controlador coordina; nunca contiene HTML ni SQL crudo.
*/

Route::get('/', function () {
    return redirect()->route('comercios.index');
});

Route::get('/comercios', [ComercioController::class, 'index'])
    ->name('comercios.index');

Route::get('/comercios/{comercio}', [ComercioController::class, 'show'])
    ->name('comercios.show');


Route::get('/practica/formulario-demo', function () {
    return view('practica.formulario_demo');
});


Route::post('/practica/enviar', function (GuardarTransaccionRequest $request) {
    return '¡Formulario validado con éxito! Datos: ' . json_encode($request->validated());
});


Route::get(
    '/comercios/{comercio}/transacciones/nueva',
    [TransaccionController::class, 'create']
)->name('transacciones.create');

Route::post(
    '/transacciones',
    [TransaccionController::class, 'store']
)->name('transacciones.store');
