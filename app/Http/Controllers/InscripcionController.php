<?php

namespace App\Http\Controllers;
use App\Models\suvenires;
use App\Models\inscripciones;
use App\Models\alumnos;
use App\Models\Simposio;
use App\Models\detalles_inscripcions;
use Illuminate\Support\Carbon;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function detalles()
    {
        // Recuperar los datos pasados en la redirección
        $alumno = session('alumno');
        $optener = session('optener');
        $detalles = session('detalles');
        $subtotal = session('subtotal');
        $simposio = session('simposio');

        // Verificar que los datos existen en la sesión
        if (!$alumno || !$optener || !$simposio) {
            return redirect()->route('preRegistro')->withErrors('No se encontraron los detalles.');
        }

        // Devolver la vista con los datos
        return view('detallesPreRegistro', compact('alumno', 'optener', 'detalles', 'subtotal', 'simposio'));
    }

    public function imprimirBoleta(Request $request){
        $validatedData = $request->validate([
            'carnet' => 'required',
            'nombre' => 'required',
            'no_boleta' => 'required',
            'fecha' => 'required',
            'inscripcion' => 'required',
            'subTotal' => 'required',
            'total' => 'required',
        ]);

        try {
            // genera un reporte del preRegistro
            $pdf = Pdf::loadView('generarPDF', $validatedData );
            // Obtiene el valor de 'no_boleta' para el nombre del archivo
            $no_boleta = $validatedData['no_boleta'];

            // Descarga el PDF con el nombre de archivo que incluye no_boleta
            return $pdf->download('boleta_pago_' . $no_boleta . '.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al generar el PDF: ' . $e->getMessage()]);
        }

    }

}