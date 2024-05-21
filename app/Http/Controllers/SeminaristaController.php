<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeminaristaRequest;
use App\Models\Seminarista;

class SeminaristaController extends Controller
{

    public function select(Request $request){
        $search = $request->input('search');

        // Si hay un término de búsqueda, filtramos los usuarios
        if ($search) {
            $seminarista = Seminarista::where('nombres', 'like', "%$search%")
                        ->orWhere('apellidos', 'like', "%$search%")
                        ->orWhere('tema', 'like', "%$search%")
                        ->get();
        } else {
            // Si no hay término de búsqueda, obtenemos todos los usuarios
            $seminarista = Seminarista::all();
        }

        return view('Seminaristas', compact('seminarista'));
    }

    public function register(SeminaristaRequest $request){
        $seminarista = Seminarista::create($request->validated());
        return redirect('/registroSeminarista')->with('success','El registro fue exitoso');
    }

    public function eliminar($id_seminarista)
    {
        $seminarista = Seminarista::findOrFail($id_seminarista);
        $seminarista->delete();

        return redirect()->back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editar( Seminarista $seminarista)
    {
        return view('actualizarSeminarista', ['seminarista' => $seminarista]);
    }

    public function actualizar(Request $request, Seminarista $seminarista)
    {
        $validated = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'tema' => 'required',
            'telefono' => 'required',
            'viaticos' => 'required|numeric',
            'hoja_vida' => 'required',
        ]);

        // Elimina las claves de $validated que estén vacías (excepto el token CSRF)
        $validated = array_filter($validated, function ($value, $key) {
            return $value !== null && $key !== '_token';
        }, ARRAY_FILTER_USE_BOTH);

        // Actualiza los datos del seminarista si hay cambios
        if (!empty($validated)) {
            $seminarista->update($validated);
            return redirect()->route('seminaristas')->with('success', 'Seminarista actualizado');
        } else {
            return redirect()->route('seminaristas')->with('info', 'No se realizaron cambios');
        }
    }

    public function info(Seminarista $seminarista){
        return view('hojaVidaSeminarista', ['seminarista' => $seminarista]);
    }

}