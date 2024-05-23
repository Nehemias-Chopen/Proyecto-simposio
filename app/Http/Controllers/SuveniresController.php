<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuvenirRequest;
use App\Models\Suvenires;

class SuveniresController extends Controller
{
    public function select(Request $request){
        $search = $request->input('search');

        // Si hay un término de búsqueda, filtramos los usuarios
        if ($search) {
            $suvenir = Suvenires::where('codigo', "$search")
                        ->orWhere('nombre', 'like', "%$search%")
                        ->get();
        } else {
            // Si no hay término de búsqueda, obtenemos todos los usuarios
            $suvenir = Suvenires::all();
        }

        return view('suvenir', compact('suvenir'));
    }

    public function register(SuvenirRequest $request){
        $suvenir = Suvenires::create($request->validated());
        return redirect('/ingresarSuvenir')->with('success','Se registro el Suvenir con exito');
    }

    public function eliminar($codigo)
    {
        $suvenir = Suvenires::findOrFail($codigo);
        $suvenir->delete();

        return redirect()->back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editar( Suvenires $suvenir)
    {
        return view('actualizarSuvenir', ['suvenir' => $suvenir]);
    }

    public function actualizar(Request $request, Suvenires $suvenir)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ]);

        // Actualiza los datos del suvenir
        $suvenir->update($validated);
        return redirect()->route('suvenires')->with('success', 'Suvenir actualizado');
    }

}