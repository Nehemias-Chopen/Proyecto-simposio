<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuveniresController;
use App\Http\Controllers\SimposioController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\SeminaristaController;
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

Route::controller(PageController::class)->group(function (){
    Route::get('/', 'gestiones')->name('gestiones');

    /*---------Routes usados en el modulo de preRegistro--------------------*/
    Route::get('/preRegistro', 'preRegistro')->name('preRegistro');
    Route::post('/detallespreRegistro', 'register')->name('ingresarRegistro');

    /*---------Routes usados en el modulo de registroInscripcion-----------*/
    Route::get('/registroInscripcion',  'registroInscripcion')->name('registroInscripcion');
});

/*---------Routes usados en el modulo de preRegistro--------------------*/
Route::get('/infoPreregistro/{no_boleta}', [InscripcionController::class, 'detalles'])->name('detallesPreRegistro');

/*---------Routes usados en el modulo de login--------------------*/
Route::get('/login', [AuthController::class, 'index'])->name('admins');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/moduloDisponible', [AuthController::class, 'moduloDisponible'])->name('moduloDisponible');
Route::get('/gestionEntradas', [AuthController::class, 'gestionEntradas'])->name('gestionEntradas');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*----------Routas usadas en el modulo de super usuario-----------*/
Route::get('/registroUser', [AuthController::class, 'registroUser'])->name('registroUser');
Route::middleware('auth')->get('/administrador', [UserController::class, 'select'])->name('administrador');
Route::middleware('auth')->post('/registroUser', [UserController::class, 'register'])->name('registro');
Route::delete('/administrador/{id}', [UserController::class, 'eliminar'])->name('eliminarUsuario');
Route::get('/actualizarUsuario/{user}', [UserController::class, 'editar'])->name('editarUsuario');
Route::put('/actualizarUsuario/{user}', [UserController::class, 'actualizar'])->name('actualizarUsuario');

/*-----------Rutas usadas en el modulo suvenir-------------------*/
Route::get('/ingresarSuvenir', [AuthController::class, 'ingresarSuvenir'])->name('ingresarSuvenir');
Route::middleware('auth')->get('/suvenires', [SuveniresController::class, 'select'])->name('suvenires');
Route::middleware('auth')->post('/ingresarSuvenir', [SuveniresController::class, 'register'])->name('registroSuvenir');
Route::delete('/suvenires/{id}', [SuveniresController::class, 'eliminar'])->name('eliminarSuvenir');
Route::get('/actualizarSuvenir/{suvenir}', [SuveniresController::class, 'editar'])->name('editarSuvenir');
Route::put('/actualizarSuvenir/{suvenir}', [SuveniresController::class, 'actualizar'])->name('actualizarSuvenir');

/*-----------Rutas usadas en el modulo simposio-------------------*/
Route::get('/actualizarSimposio/{simposio}', [SimposioController::class, 'editar'])->name('simposio');
Route::put('/actualizarSimposio/{simposio}', [SimposioController::class, 'actualizar'])->name('actualizarSimposio');

/*-----------Rutas usadas en el modulo Seminaristas-------------------*/
Route::get('/registroSeminarista', [AuthController::class, 'registroSeminarista'])->name('registroSeminarista');
Route::middleware('auth')->get('/seminaristas', [SeminaristaController::class, 'select'])->name('seminaristas');
Route::middleware('auth')->post('/registroSeminarista', [SeminaristaController::class, 'register'])->name('registroSeminarista');
Route::delete('/seminaristas/{id_seminarista}', [SeminaristaController::class, 'eliminar'])->name('eliminarSeminarista');
Route::get('/actualizarSeminarista/{seminarista}', [SeminaristaController::class, 'editar'])->name('editarSeminarista');
Route::put('/actualizarSeminarista/{seminarista}', [SeminaristaController::class, 'actualizar'])->name('actualizarSeminarista');

/*-----------Rutas usadas en el modulo Comprobar Boletas-------------------*/
Route::middleware('auth')->get('/comprobarBoleta', [SimposioController::class, 'select'])->name('comprobarBoleta');
Route::middleware('auth')->post('/comprobarBoleta/{id}/inscribir', [SimposioController::class, 'inscribir'])->name('inscripciones.inscribir');

route::get('/detallesPago', function(){
    return view('detallesPago');
});

/*-----------Rutas usadas en el modulo crear pdf-------------------*/
Route::get('/generarPDF', [PDFController::class, 'generarPDF'])->name('generarPDF');