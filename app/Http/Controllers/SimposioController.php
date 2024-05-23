<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Simposio;
use App\Models\inscripciones;
use App\Models\alumnos;
use App\Models\detalles_inscripcions;
use App\Models\suvenires;
use App\Mail\ConfirmarInscripcionMailable;

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
        $alumno = alumnos::where('carnet', $id)->get();
        foreach ($alumno as $alumno) {
                Mail::to($alumno->email)->send(new ConfirmarInscripcionMailable($alumno));
        }

        $ins = inscripciones::where('estudiante', $id)->get();
        foreach ($ins as $ins){
            $inscripcion = inscripciones::findOrFail($ins->no_boleta);
            $inscripcion->estado = 'Inscrito';
            $inscripcion->save();
        }

        return redirect()->back()->with('success', 'El estado de la inscripción ha sido actualizado a Inscrito.');
    }

    public function detalles($no_boleta)
    {
        // Obtener la inscripción basada en el número de boleta
        $inscripciones = inscripciones::where('no_boleta', $no_boleta)->get();

        // Crear un array para almacenar todos los detalles
        $resultados = [];

        // Iterar sobre cada inscripción
        foreach ($inscripciones as $inscripcion) {
            // Obtener los detalles del alumno basado en el carnet
            $alumno = alumnos::where('carnet', $inscripcion->estudiante)->first();

            $detallesInscripcion = detalles_inscripcions::where('no_boleta', $inscripcion->no_boleta)->get();

            // Crear un array para almacenar los detalles del estudiante y suvenires
            $detallesEstudiante = [
                'inscripcion' => $inscripcion,
                'alumno' => $alumno,
                'suvenires' => []
            ];

            // Iterar sobre cada detalle de inscripción para obtener los suvenires asociados
            foreach ($detallesInscripcion as $detalle) {
                $suvenires = suvenires::where('codigo', $detalle->suvenir)->get();
                // Añadir los suvenires al array de detalles del estudiante
                $detallesEstudiante['suvenires'][] = $suvenires;
            }

            // Añadir los detalles del estudiante al array de resultados
            $resultados[] = $detallesEstudiante;
        }

        // Retornar los resultados
        return view('detalleInscripcion', compact('resultados'));
    }

}