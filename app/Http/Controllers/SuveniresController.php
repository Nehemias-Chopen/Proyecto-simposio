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
}