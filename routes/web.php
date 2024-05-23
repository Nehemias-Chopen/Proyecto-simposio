<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuveniresController;
use App\Http\Controllers\SimposioController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\SeminaristaController;
use App\Http\Controllers\AsistenciaSimposioController;
use App\Models\alumnos;
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
    Route::get('/registroInscripcion/{boleta}',  'detallesPago')->name('detallesPago');
    Route::get('/mensajeRegistro',  'mensajeRegistro')->name('mensajeRegistro');

    });

/*---------Routas usadas para el registro */
Route::post('/registroInscripcion',[AlumnosController::class,'verificar'])->name('verificar');
Route::put('/inscripciones/{inscripcion}', [AlumnosController::class, 'actualizar'])->name('actualizarInscripcion');


/*---------Routes usados en el modulo de preRegistro--------------------*/
Route::get('/infoPreregistro', [InscripcionController::class, 'detalles'])->name('detallesPreRegistro');
Route::post('/infoPreregistro', [InscripcionController::class, 'imprimirBoleta'])->name('imprimirBoleta');

/*---------Routes usados en el modulo de login--------------------*/
Route::get('/login', [AuthController::class, 'index'])->name('admins');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/moduloDisponible', [AuthController::class, 'moduloDisponible'])->name('moduloDisponible');
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
Route::middleware('auth')->get('/actualizarSeminarista/{seminarista}', [SeminaristaController::class, 'editar'])->name('editarSeminarista');
Route::middleware('auth')->put('/actualizarSeminarista/{seminarista}', [SeminaristaController::class, 'actualizar'])->name('actualizarSeminarista');
Route::middleware('auth')->get('/infoSeminarista/{seminarista}', [SeminaristaController::class, 'info'])->name('infoSeminarista');

/*-----------Rutas usadas en el modulo Comprobar Boletas-------------------*/
Route::middleware('auth')->get('/comprobarBoleta', [SimposioController::class, 'select'])->name('comprobarBoleta');
Route::middleware('auth')->post('/comprobarBoleta/{id}/inscribir', [SimposioController::class, 'inscribir'])->name('inscripciones.inscribir');
Route::middleware('auth')->get('/detalles/{no_boleta}', [SimposioController::class, 'detalles'])->name('detallesInscripcion');

/*-----------Rutas usadas en el modulo asistencia-------------------------- */
Route::middleware('auth')->get('/lista_aistencia', [AsistenciaSimposioController::class, 'select'])->name('listaAsistencia');
Route::middleware('auth')->post('/asistenciaRegistro', [AsistenciaSimposioController::class, 'register'])->name('registroSuvenir');

/*-----------Rutas usadas en el modulo Gestion de Entradas--------------- */
Route::middleware('auth')->get('/gestionEntradas', [AuthController::class, 'gestionEntradas'])->name('gestionEntradas');
Route::middleware('auth')->post('/Asistencia',[AlumnosController::class,'comprobarAsistencia'])->name('comprobarAsistencia');

/*-----------Rutas usadas en el modulo crear pdf-------------------*/
Route::get('/facturacion', [PageController::class, 'facturacion'])->name('facturacion');