<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asistencia_simposios;
use App\Models\alumnos;
use App\Http\Requests\AsistenciaRequest;
use App\Mail\CertificadoEntregaMailable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Carbon;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Storage;

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

    public function register(Request $request)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'nombre' => 'required',
            'carnet' => 'required',
            'no_boleta' => 'required',
        ]);

        // Configurar opciones de Dompdf
        $options = new Options();
        $options->set('isPhpEnabled', true); // Habilitar el uso de PHP en la vista

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf($options);

        // Establecer la orientación del papel a horizontal
        $dompdf->setPaper('A4', 'landscape');

        // Renderizar la vista a HTML
        $data = [
            'nombre' => $request->input('nombre'),
            'carnet' => $request->input('carnet'),
            'no_boleta' => $request->input('no_boleta'),
            'fecha' => Carbon::now()->toDateString(),
        ];
        $html = view('certificadoPDF', $data)->render();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Definir el nombre del archivo y la ruta
        $filename = 'certificado_' . $request->input('carnet') . '.pdf';
        $path = 'pdf/' . $filename;

        // Guardar el PDF en la ruta especificada dentro de storage/app
        file_put_contents(storage_path('app/' . $path), $dompdf->output());

        // Crear la entrada en la base de datos
        $asistencia_simposio = asistencia_simposios::create([
            'carnet' => $request->input('carnet'),
            'nombre' => $request->input('nombre'),
            'no_boleta' => $request->input('no_boleta'),
            'pdf' => $filename,
        ]);

        return redirect('/gestionEntradas')->with('success', 'Se confirmó con éxito la asistencia');
    }

    public function entregaCertificado()
    {
        $asistencias = asistencia_simposios::all();
        $notFoundCarnets = [];

        foreach ($asistencias as $asistencia) {
            $alumno = alumnos::where('carnet', $asistencia->carnet)->first();

            if ($alumno) {
                $pdfPath = storage_path('app/pdf/' . $asistencia->pdf);
                Mail::to($alumno->email)->send(new CertificadoEntregaMailable($pdfPath));
            } else {
                $notFoundCarnets[] = $asistencia->carnet;
            }
        }

        if (!empty($notFoundCarnets)) {
            // Aquí puedes manejar los carnets que no se encontraron, por ejemplo, registrándolos en un log.
            // Log::warning("No se encontraron alumnos con los siguientes carnets: " . implode(', ', $notFoundCarnets));
            // O puedes informar al usuario:
            return redirect()->back()->with('error', 'Algunos certificados no fueron enviados porque no se encontraron los alumnos con los carnets: ' . implode(', ', $notFoundCarnets));
        }

        return redirect()->back()->with('success', 'Los certificados fueron enviados.');
    }

}