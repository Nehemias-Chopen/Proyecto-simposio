<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\suvenires;
use App\Models\Simposio;
use App\Models\inscripciones;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use App\Models\detalles_inscripcions;
=======
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PDFController;
>>>>>>> 6ee76df95e423020c5a9f49fd06e7d98df737a0c

class PageController extends Controller
{

    public function gestiones()
    {
        return view('gestiones');
    }

    /*---------funciones usadas en preRegistro--------------------*/
    public function preRegistro()
    {
        $suvenir = suvenires::all();
        $simposio = Simposio::all();
        return view('preRegistro',  compact('suvenir', 'simposio'));
    }
    

    public function register(Request $request){
        /*---------------Validacion de los campos y comprovacion de que el carnet no este registrado */
        $request->validate([
            'carnet' => 'required|unique:alumnos,carnet',
            'nombre' => 'required',
            'telefono' => 'required',
            'semestre' => 'required',
            'suvenirg' => 'required',
            'costoTotal' => 'required',
        ], [
            'carnet.unique' => 'El estudiante ya se encuentra registrado',
        ]);

        /*-----------------Se Ingresan los datos del estudiante a la tabla Alumnos */
        $alumno = alumnos::create([
            'carnet' => $request->input('carnet'),
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'semestre' => $request->input('semestre')
        ]);

        /*------------------Se ingresan los datos de la inscripcion luego de registrar al alumno */
        $inscripciones = inscripciones::create([
            'estudiante' => $request->input('carnet'),
            'total' => $request->input('costoTotal'),
            'estado' => 'Pre-Registro',
            'imagen' => 'NULL',
            'suvenir' => $request->input('suvenirg'),
        ]);
<<<<<<< HEAD

        /*se obtiene el codigo de la boleta por medio de busqueda del carnet del estudiante registrado */
            $carnet = $request->input('carnet');
            $optener = inscripciones::where('estudiante', $carnet)->get();


        /*--------------------Se registra en detalles los suvenires extra elegidos por el alumno */
        foreach ($optener as $optener) {
            if ($request->has('suvenir')) {
                foreach ($request->input('suvenir') as $suvenir) {
                    detalles_inscripcions::create([
                        'no_boleta' => $optener->no_boleta,
                        'suvenir' => $suvenir
                    ]);
                }
            }

            // Redirigir al método mostrarInscripcion del InscripcionController
            return redirect()->route('detallesPreRegistro', ['no_boleta' => $optener->no_boleta]);
        };
}

=======
       
        try {
            // genera un reporte del preRegistro
            $pdf = Pdf::loadView('generarPDF', compact('alumno', 'inscripciones'));
            // verificamos si no existe algun error al crear el pdf
            return $pdf->stream('documento.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al generar el PDF: ' . $e->getMessage()]);
        }
        
        // return $pdf->stream('documento.pdf');
        //return [$inscripciones,$alumno];
        
    }   
    
>>>>>>> 6ee76df95e423020c5a9f49fd06e7d98df737a0c
    /*---------Funciones usadas para registroInscripcion--------------------*/
   
    public function registroInscripcion()
    {
        return view('registroInscripcion');
    }

<<<<<<< HEAD
    public function detallesPreRegistro()
    {
        return view('detallesPreRegistro');
    }
=======


>>>>>>> 6ee76df95e423020c5a9f49fd06e7d98df737a0c
}