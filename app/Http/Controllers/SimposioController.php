<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\simposio;

class SimposioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editar( Simposio $simposio)
    {
        return view('simposio', ['simposio' => $simposio]);
    }

    public function actualizar(Request $request, Simposio $simposio)
    {
        $validated = $request->validate([
            'tema' => 'required',
            'costo' => 'required|numeric',
        ]);

        // Actualiza los datos del suvenir
        $simposio->update($validated);
        return redirect()->route('simposio', 1)->with('success', 'Se actualizo con exito');
    }
}