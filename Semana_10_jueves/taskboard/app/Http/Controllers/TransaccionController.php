<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comercio;
use App\Models\Transaccion;
use Illuminate\View\View;

class TransaccionController extends Controller
{
    public function create(Comercio $comercio): View
    {
        return view('transacciones.create', compact('comercio'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'comercio_id' => 'required|exists:comercios,id',
                'cliente_nombre' => 'required|string|max:255',
                'monto' => 'required|numeric|min:0.01',
            ],

            [
                'cliente_nombre.required' => 'Debes indicar el nombre del cliente.',
                'monto.required' => 'Debes indicar un monto.',
                'monto.numeric' => 'El monto debe ser un número.',
                'monto.min' => 'El monto debe ser mayor a cero.',
            ]
        );

        //haciendo la minsion A - nombre minimo razonable

        $request->validate([
            'comercio_id' => 'required|exists:comercios,id',
            // Agregando min:3 aquí:
            'cliente_nombre' => 'required|string|min:3|max:255',
            'monto' => 'required|numeric|min:0.01',
        ], [
            'cliente_nombre.required' => 'Debes indicar el nombre del cliente.',
            // Agregando el mensaje personalizado aquí:
            'cliente_nombre.min' => 'El nombre del cliente es demasiado corto.',
            'monto.required' => 'Debes indicar un monto.',
            'monto.numeric' => 'El monto debe ser un número.',
            'monto.min' => 'El monto debe ser mayor a cero.',
        ]);

        $transaccion = Transaccion::create($request->only([
            'comercio_id',
            'cliente_nombre',
            'monto',
        ]));

        return redirect()
            ->route('comercios.show', $transaccion->comercio_id)
            ->with('mensaje', 'Transacción registrada con éxito.');
    }
}
