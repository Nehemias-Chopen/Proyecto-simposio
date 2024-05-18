<?php

namespace App\Http\Controllers;
use App\Models\suvenires;
use App\Models\inscripciones;
use App\Models\alumnos;
use App\Models\Simposio;
use App\Models\detalles_inscripcions;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function detalles($no_boleta)
    {
        // Preparación de los datos para enviar a la vista
        $inscripcionvista = inscripciones::with([
            'alumnos'
        ])
        ->where('no_boleta', $no_boleta)
        ->first();
        if ($inscripcionvista) {
            // Proceso de los datos recuperados
            $inscripcionvista->formatted_date = Carbon::parse($inscripcionvista->created_at)->format('Y-m-d');
            $alumno = $inscripcionvista->alumnos;
        } else {
            // Manejo en caso de no encontrar inscripciones con ese número de boleta
        }

        // Obtener todos los registros que coincidan con el no_boleta y cargar la relación suvenir
        $detalles = detalles_inscripcions::with('suvenires')->where('no_boleta', $no_boleta)
        ->get();

        $simposio = Simposio::all();


        return view('detallesPreRegistro', compact('inscripcionvista', 'simposio', 'detalles'));
    }
}