<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\suvenires;
use App\Models\Simposio;
use App\Models\inscripciones;
use App\Models\detalles_inscripcions;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PDFController;

class PageController extends Controller
{
    public function detallesPago(){
     $alumno = alumnos::all();
       $inscripciones = inscripciones::all();
         return view('detallesPago',compact('alumno', 'inscripciones'));
    }


    public function gestiones()
    {
        return view('gestiones');
    }

    public function mensajeRegistro()
    {
        return view('mensajeRegistro');
    }
    /*---------funciones usadas en preRegistro--------------------*/
    public function preRegistro()
    {
        $suvenir = suvenires::all();
        $simposio = Simposio::all();
        return view('preRegistro',  compact('suvenir', 'simposio'));
    }


    public function register(Request $request){
        $request->validate([
            'carnet' => 'required|unique:alumnos,carnet',
            'nombre' => 'required',
            'email' => 'required|unique:alumnos,email',
            'telefono' => 'required',
            'semestre' => 'required',
            'suvenirg' => 'required',
            'costoTotal' => 'required',
        ], [
            'carnet.unique' => 'El carnet ya ha sido registrado.',
            'email.unique' => 'El correo ya ha sido registrado.',
        ]);

        $alumno = alumnos::create([
            'carnet' => $request->input('carnet'),
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'semestre' => $request->input('semestre')
        ]);

        $inscripciones = inscripciones::create([
            'estudiante' => $request->input('carnet'),
            'total' => $request->input('costoTotal'),
            'estado' => 'Pre-Registro',
            'imagen' => 'NULL',
            'suvenir' => $request->input('suvenirg'),
        ]);

         // Obtener el código de la boleta por medio de búsqueda del carnet del estudiante registrado
        $optener = inscripciones::where('estudiante', $request->input('carnet'))->get();

        // Registrar en detalles los souvenirs extra elegidos por el alumno
        $detalles = [];
        $subtotal = 0;
        if ($request->has('suvenir') && !empty($request->input('suvenir'))) {
            if ($request->has('suvenir')) {
                foreach ($request->input('suvenir') as $suvenir_id) {
                    foreach ($optener as $opt) {
                        // Crear el detalle de inscripción
                        $detalle = detalles_inscripcions::create([
                            'no_boleta' => $opt->no_boleta,
                            'suvenir' => $suvenir_id
                        ]);

                        // Obtener la información del souvenir
                        $suvenir = suvenires::find($suvenir_id);
                        $detalle->suvenir_info = $suvenir;

                        // Añadir el detalle al array de detalles
                        $detalles[] = $detalle;

                        $subtotal += $suvenir->precio;
                    }
                }
            }
        }


        $simposio = Simposio::all();
        // Guardar los datos en la sesión
        session([
            'alumno' => $alumno,
            'optener' => $optener,
            'detalles' => $detalles,
            'subtotal' => $subtotal,
            'simposio' => $simposio
        ]);

        return redirect()->route('detallesPreRegistro');
    }

    /*---------Funciones usadas para registroInscripcion--------------------*/

    public function registroInscripcion()
    {
        return view('registroInscripcion');
    }
}