<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\Suvenires;
use App\Models\Simposio;
use App\Models\inscripciones;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PDFController;

class PageController extends Controller
{

    public function gestiones()
    {
        return view('gestiones');
    }

    /*---------funciones usadas en preRegistro--------------------*/
    public function preRegistro()
    {
        $suvenir = Suvenires::all();
        $simposio = Simposio::all();
        return view('preRegistro',  compact('suvenir', 'simposio'));
    }
    

    public function register(Request $request){
        $request->validate([
            'carnet' => 'required|unique:alumnos,carnet',
            'nombre' => 'required',
            'telefono' => 'required',
            'semestre' => 'required',
            'suvenirg' => 'required',
            'costoTotal' => 'required',
        ], [
            'carnet.unique' => 'El carnet ya ha sido registrado.',
        ]);

        $alumno = Alumnos::create([
            'carnet' => $request->input('carnet'),
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'semestre' => $request->input('semestre')
        ]);

        $inscripciones = Inscripciones::create([
            'estudiante' => $request->input('carnet'),
            'total' => $request->input('costoTotal'),
            'estado' => 'Pre-Registro',
            'imagen' => 'NULL',
            'suvenir' => $request->input('suvenirg'),
        ]);
       
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
    
    /*---------Funciones usadas para registroInscripcion--------------------*/
   
    public function registroInscripcion()
    {
        return view('registroInscripcion');
    }



}