<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        return redirect('/registroUser')->with('success','Se registro el usuario con exito');
    }

    public function select(Request $request){
        $search = $request->input('search');

        // Si hay un término de búsqueda, filtramos los usuarios
        if ($search) {
            $user = User::where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->get();
        } else {
            // Si no hay término de búsqueda, obtenemos todos los usuarios
            $user = User::all();
        }

        return view('administrador', compact('user'));
    }

    public function eliminar($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editar( User $user)
    {
        return view('actualizarUsuario', ['user' => $user]);
    }

    public function actualizar(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'password_confirm' => 'nullable|same:password'
        ]);

        // Elimina las claves de $validated que estén vacías (excepto el token CSRF)
        $validated = array_filter($validated, function ($value, $key) {
            return $value !== null && $key !== '_token';
        }, ARRAY_FILTER_USE_BOTH);

        // Actualiza los datos del usuario si hay cambios
        if (!empty($validated)) {
            $user->update($validated);
            return redirect()->route('administrador')->with('success', 'Usuario actualizado');
        } else {
            return redirect()->route('administrador')->with('info', 'No se realizaron cambios');
        }
    }

}