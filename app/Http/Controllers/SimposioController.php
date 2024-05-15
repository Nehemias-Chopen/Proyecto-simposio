<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\simposio;

class SimposioController extends Controller
{
    public function select(){
        $simposio = Simposio::all();
        return view('simposio',  compact('simposio'));
    }
}