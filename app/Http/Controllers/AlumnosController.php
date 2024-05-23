<?php

namespace App\Http\Controllers;
use App\Models\inscripciones;
use App\Models\alumnos;
use App\Models\Simposio;
use App\Models\asistencia_simposios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use App\Mail\ConfirmacionRegistroMailable;

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
        return redirect()->back()->with('error', 'Datos incorrectos o no esta Pre-Registrado.');
    } else {
        // Verificar el estado del registro
        switch ($inscripcion->estado) {
            case 'Registrado':
                // Si el estado es 'Registrado', mostrar un mensaje de espera
                return redirect()->back()->with('error', 'Espere a que se valide su inscripción.');
            case 'Inscrito':
                // Si el estado es 'Inscrito', mostrar un mensaje de ya inscrito
                return redirect()->back()->with('error', 'Ya está Inscrito.');
            case 'Pre-Registro':
                // Si el estado es 'Pre-Registro', proceder con el proceso
                $inscripciones = inscripciones::with('alumnos')
                    ->where('no_boleta', "$boleta")
                    ->get();
                return view('detallesPago', compact('inscripciones'));
            default:
                // Si el estado no coincide con ninguno de los anteriores
                return redirect()->back()->with('error', 'Estado desconocido.');
        }
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
    $carnet = $request->input('carnet');

    // Actualizar los datos de la inscripción
    if (!empty($validated)) {

        $alumno = alumnos::where('carnet', $carnet)->get();
        foreach ($alumno as $alumno) {

            Mail::to($alumno->email)->send(new ConfirmacionRegistroMailable($alumno));
        }

        // Mostrar mensaje al finalizar Registro//
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

        // Verificar en la tabla inscripciones
        $asistencia = inscripciones::where(function($query) use ($comprobar) {
            $query->where('estudiante', 'like', "%$comprobar%")
                  ->orWhere('no_boleta', $comprobar);
        })
        ->where('estado', 'Inscrito')
        ->first();

        if (!$asistencia) {
            // Si no se encuentran los datos, redirigir de vuelta con un mensaje de error
            return redirect()->back()->with('error', 'No está Inscrito.');
        } else {
            // Verificar en la tabla asistencia_simposios
            $registroExistente = asistencia_simposios::where(function($query) use ($comprobar) {
                $query->where('carnet', 'like', "%$comprobar%")
                      ->orWhere('no_boleta', $comprobar);
            })
            ->exists();

            if ($registroExistente) {
                // Si el registro ya existe en la tabla asistencia_simposios, redirigir de vuelta con un mensaje de error
                return redirect()->back()->with('error', 'Ya se registro la asistencia de este estudiante.');
            }

            // Obtener inscripciones con relación a alumnos
            $inscripciones = inscripciones::with('alumnos')->where(function($query) use ($comprobar) {
                $query->where('no_boleta', $comprobar)
                      ->orWhere('estudiante', 'like', "%$comprobar%");
            })->get();

            return view('asistencia', compact('inscripciones'));
        }
    }

}