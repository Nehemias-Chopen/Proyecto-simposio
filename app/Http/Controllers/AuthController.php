<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
	* Función que muestra la vista de logados o la vista con el formulario de Login
	*/
	public function index()
	{
	    // Comprobamos si el usuario ya está logado
	    if (Auth::check()) {

	        // Si está logado le mostramos la vista de modulos disponibles
	        return view('moduloDisponible');
	    }

	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('login');
	}
    /**
	* Función que se encarga de recibir los datos del formulario de login, comprobar que el usuario existe y
	* en caso correcto logar al usuario
	*/
	public function login(Request $request)
	{
	    // Comprobamos que el usuario y la contraseña han sido introducidos
	    $request->validate([
	        'email' => 'required',
	        'password' => 'required',
	    ]);

	    // Almacenamos las credenciales de usuario y contraseña
	    $credentials = $request->only('email', 'password');

	    // Si el usuario existe lo logamos y lo llevamos a la vistas
	    if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('moduloDisponible');
	    }

	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect("login")->withSuccess('Los datos introducidos no son correctos');
	}

	/**
	* Función que muestra la vista de logados si el usuario está logado y si no le devuelve al formulario de login
	* con un mensaje de error
	*/
	public function moduloDisponible()
	{
	    if (Auth::check()) {
	        return view('moduloDisponible');
	    }

	    return redirect("login")->withSuccess('No tienes acceso, por favor inicia sesión');
    }
    public function gestionEntradas()
	{
	    if (Auth::check()) {
	        return view('gestionEntradas');
	    }

	    return redirect("login")->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    public function comprobarBoleta()
    {
        if (Auth::check()) {
            return view('comprobarBoleta');
        }

        return redirect("login")->withSuccess('No tienes acceso, por favor inicia sesión');
    }
    public function registroSeminarista()
    {
        if (Auth::check()) {
            return view('registroSeminarista');
        }

        return redirect("login")->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    public function registroUser()
    {
        if (Auth::check()) {
            return view('RegistrarUsuario');
        }

        return redirect("login")->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    public function suvenires(){
        if (Auth::check()) {
            return view('suvenir');
        }

        return redirect('login')->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    public function ingresarSuvenir(){
        if (Auth::check()) {
            return view('ingresarSuvenir');
        }

        return redirect('login')->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    /**
	* Funcion usada para cerrar la secion
	*/
    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return $redirect->to('/');
    }
}
