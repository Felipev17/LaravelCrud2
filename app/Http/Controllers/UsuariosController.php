<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UsuariosController extends Controller
{
    //CONSULTA USUARIOS Y LOS DEVUELVE A LA VISTA INDEX (TABLA)
    public function index()
    {
        $usuarios = Usuario::with('rol')->get();
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }


public function create()
{
    $roles = Roles::all(); // Obtén todos los roles

    return view('usuarios.create', compact('roles',));
}

    //GUARDA LOS USUARIOS DEL FORMULARIO DE CREAR EN LA BASE DE DATOS
    public function store(Request $request)
    {
        
        Usuario::create($request->all());
        try {
    
            $usuario = new Usuario();
            $usuario->documento = $request->documento;
            $usuario->nombres = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->Telefono = $request->Telefono;
            $usuario->Rol = $request->Rol;
            $usuario->password = $request->password; // Asegúrate de manejar la contraseña adecuadamente
            $usuario->save();
    
            // Si se crea correctamente, redirige a una página de éxito o donde lo necesites
            return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Si se produce un error de integridad de la base de datos, captúralo
            if ($e->errorInfo[1] === 1062) { // 1062 es el código de error para la violación de clave única
                throw ValidationException::withMessages([
                    'Telefono' => 'El número de teléfono ya está en uso.',
                ])->redirectTo(route('usuarios.create')); // Redirige de nuevo al formulario de creación con el error
            }
        }
    }

    //CARGAR EL FORMULARIO DE EDICIÓN
    public function edit($id)
    {
        // Obtener el usuario que se va a editar
        $usuario = Usuario::findOrFail($id);
    
        // Obtener todos los roles disponibles
        $roles = Roles::all();
    
        // Retornar la vista de edición con los datos del usuario y los roles disponibles
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    //EDITAR USUARIO
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
        return redirect()->route('usuarios.index');
    }

    //ELIMINAR USUARIO
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }

}
