<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asistencia_simposios;
use App\Http\Requests\AsistenciaRequest;

class AsistenciaSimposioController extends Controller
{
    public function select(Request $request){
        $search = $request->input('search');

        // Si hay un término de búsqueda, filtramos los usuarios
        if ($search) {
            $asistencias = asistencia_simposios::where('no_boleta', "$search")
                        ->orWhere('nombre', 'like', "%$search%")->orWhere('carnet', 'like', "%$search%")
                        ->get();
        } else {
            // Si no hay término de búsqueda, obtenemos todos los usuarios
            $asistencias = asistencia_simposios::all();
        }

        return view('listaAsistencia', compact('asistencias'));
    }

    public function register(AsistenciaRequest $request){
        $asistencia_simposio = asistencia_simposios::create($request->validated());
        return redirect('/gestionEntradas')->with('success','Se Confirmo con exito la asistencia');
    }
}
