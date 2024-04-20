<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('gestiones');
});

Route::get('/preRegistro', function(){
    return view('preRegistro');
});

Route::get('/registroInscripcion', function(){
    return view('registroInscripcion');
});

route::get('/detallesPago', function(){
    return view('detallesPago');
});