<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeminaristaRequest;
use App\Models\Seminarista;

class SeminaristaController extends Controller
{
    public function select(){
        $seminarista = Seminarista::all();
        return view('Seminaristas',  compact('seminarista'));
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
}
