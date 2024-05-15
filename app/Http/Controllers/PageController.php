<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Illuminate\Http\Request;
use App\Models\Suvenires;
use App\Models\Simposio;

class PageController extends Controller
{

    public function gestiones()
    {
        return view('gestiones');
    }

    /*---------funciones usadas en preRegistro--------------------*/
    public function preRegistro()
    {
        $suvenir = Suvenires::all();
        $simposio = Simposio::all();
        return view('preRegistro',  compact('suvenir', 'simposio'));
    }

    /*---------Funciones usadas para registroInscripcion--------------------*/
    public function registroInscripcion()
    {
        return view('registroInscripcion');
    }

}