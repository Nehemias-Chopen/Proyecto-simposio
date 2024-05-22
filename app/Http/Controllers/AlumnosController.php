<?php

namespace App\Http\Controllers;

use App\Models\inscripciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlumnosController extends Controller
{

    public function verificar(Request $request)
    {
         // Validar los datos del formulario
         $request->validate([
            'carnet' => 'required',
            'boleta' => 'required',
        ]);

        // Buscar en la base de datos
        $carnet = $request->input('carnet');
        $boleta = $request->input('boleta');

        $inscripcion = inscripciones::where('estudiante', $carnet)
                                  ->where('no_boleta', $boleta)
                                  ->first();

            if (!$inscripcion) {
                // Si no se encuentran los datos, redirigir de vuelta con un mensaje de error
                return redirect()->back()->with('error', 'No se a pre-Registrado.');
            } else {
            // El carné no existe en la base de datos
            $inscripciones = inscripciones::with('alumnos')->where('no_boleta', 'like', "%$boleta%")->get();
            return view(('detallesPago'), compact('inscripciones'));

        }

    }

    public function actualizar(Request $request, Inscripciones $inscripcion)
    {
        // Validar la solicitud
    $validated = $request->validate([
        'nombres' => 'required|string|max:255',
        'carnet' => 'required|string|max:255',
        'no_boleta' => 'required|string|max:255',
        'comprobante' => 'sometimes|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // validar el archivo
    ]);

    // Elimina las claves de $validated que estén vacías (excepto el token CSRF)
    $validated = array_filter($validated, function ($value, $key) {
        return $value !== null && $key !== '_token';
    }, ARRAY_FILTER_USE_BOTH);

    // Si hay un archivo de comprobante, procesarlo
    if ($request->hasFile('comprobante')) {
        $imagen = $request->file('comprobante');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $rutaImagen = $imagen->move(public_path('img/comprobantes'), $nombreImagen);

        // Agregar el nombre del archivo al array validado
        $validated['imagen'] = 'img/comprobantes/' . $nombreImagen;

        // Eliminar el archivo antiguo si existe (opcional)
        if ($inscripcion->comprobante) {
            $oldPath = public_path('img/comprobantes/' . $inscripcion->comprobante);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
    }

    // Agregar el campo 'estado' al array validado
    $validated['estado'] = 'Registrado';

    // Actualizar los datos de la inscripción
    if (!empty($validated)) {
        $inscripcion->update($validated);
            return view('mensajeRegistro');
        } else {
            return redirect()->route('actualizarInscripcion')->with('info', 'No se realizaron cambios');
        }
    }

    //funcion ussada para el modulo Gestionar entradas//
    public function comprobarAsistencia(Request $request)
    {
         // Validar los datos del formulario
         $request->validate([
            'comprobar' => 'required',
        ]);

        // Buscar en la base de datos
        $comprobar = $request->input('comprobar');

        $asistencia = inscripciones::where(function($query) use ($comprobar) {
            $query->where('estudiante', $comprobar)
                  ->orWhere('no_boleta', $comprobar);
        })
        ->where('estado', 'Inscrito')
        ->first();

            if (!$asistencia) {
                // Si no se encuentran los datos, redirigir de vuelta con un mensaje de error
                return redirect()->back()->with('error', 'No se encontro ningun resultado o no esta Inscrito.');
            } else {
            // El carné no existe en la base de datos
            $inscripciones = inscripciones::with('alumnos')->where('no_boleta', $comprobar)
            ->orWhere('estudiante', $comprobar)->get();
            return view(('detallesPago'), compact('inscripciones'));

        }

    }
}
