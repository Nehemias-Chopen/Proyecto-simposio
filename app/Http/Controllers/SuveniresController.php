<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuvenirRequest;
use App\Models\Suvenires;

class SuveniresController extends Controller
{
    public function select(){
        $suvenir = Suvenires::all();
        return view('suvenir',  compact('suvenir'));
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