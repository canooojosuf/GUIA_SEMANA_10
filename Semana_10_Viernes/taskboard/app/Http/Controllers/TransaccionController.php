<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comercio;
use App\Models\Transaccion;
use Illuminate\View\View;
use App\Http\Requests\GuardarTransaccionRequest;

class TransaccionController extends Controller
{
    public function create(Comercio $comercio): View
    {
        return view('transacciones.create', compact('comercio'));
    }


    public function store(GuardarTransaccionRequest $request)
    {


        $transaccion = Transaccion::create($request->only([
            'comercio_id',
            'cliente_nombre',
            'monto',
        ]));

        return redirect()
            ->route('comercios.show', $transaccion->comercio_id)
            ->with('mensaje', 'Transacción registrada con éxito.');
    }

    /* public function duplicarUltima(GuardarTransaccionRequest $request)
    {
        dd($request->validated());
    }*/
}
