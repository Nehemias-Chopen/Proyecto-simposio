<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlumnosController extends Controller
{
    
    public function verificar(Request $request)
    {
        $carnet = $request->input('carnet');
        
        
       $carnet = $request->input('carnet');
        $usuario = alumnos::where('carnet', $carnet)->first();


       if ($usuario ) {
            // El carné ya existe en la base de datos
            //return response()->json(['existe' => true, 'alumnos' => $usuario]);
            return redirect('/detallesPago')->with('success','El registro fue exitoso');
        } else {
            // El carné no existe en la base de datos
            return redirect()->route('registroInscripcion')->with('error', 'Lo siento, aún no completas el preRegistro');
            
        }
        
    }
}
