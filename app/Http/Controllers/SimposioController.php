<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\simposio;
use App\Models\inscripciones;

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

    // --------- funciones usadas para el modelo comprobacion boleta ------------
    public function select(Request $request){
        $search = $request->input('search');

        // Si hay un término de búsqueda, filtramos los usuarios
        if ($search) {
            $inscripciones = inscripciones::where('estudiante', 'like', "%$search%")
                        ->orWhere('no_boleta', 'like', "%$search%")
                        ->get();
        } else {
            // Si no hay término de búsqueda, obtenemos todos los usuarios
            $inscripciones = Inscripciones::with('alumnos')
    ->where('estado', '!=', 'Pre-Registro')
    ->orderByRaw("CASE WHEN estado = 'Registrado' THEN 1 ELSE 2 END")
    ->get();
        }

        return view('comprobarBoleta', compact('inscripciones'));
    }

    public function inscribir($id)
    {
        $inscripcion = inscripciones::findOrFail($id);
        $inscripcion->estado = 'Inscrito';
        $inscripcion->save();

        return redirect()->back()->with('success', 'El estado de la inscripción ha sido actualizado a Inscrito.');
    }
}