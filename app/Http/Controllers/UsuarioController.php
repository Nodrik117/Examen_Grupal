<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los usuarios, ordenados por cedula de forma descendente
        $usuarios = Usuario::orderBy('cedula', 'DESC')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna una vista con el formulario para crear un nuevo usuario
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'cedula' => 'required|string|max:20|unique:usuarios,cedula',
            'genero' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed', // Aseguramos que la contraseña esté confirmada
            'telefono' => 'nullable|string|max:20',
        ]);

        // Crear un nuevo usuario con los datos validados
        Usuario::create([
            'cedula' => $validatedData['cedula'],
            'genero' => $validatedData['genero'],
            'apellido' => $validatedData['apellido'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Encriptar la contraseña
            'telefono' => $validatedData['telefono'] ?? null,
        ]);

        // Redirigir a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cedula)
    {
        // Buscar el usuario por su cedula
        $usuario = Usuario::findOrFail($cedula);

        // Retorna una vista para mostrar los detalles del usuario
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cedula)
    {
        // Buscar el usuario por su cedula
        $usuario = Usuario::findOrFail($cedula);

        // Retorna una vista con el formulario para editar el usuario
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cedula)
    {
        // Validación de los datos recibidos
        $validatedData = $request->validate([
            'genero' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $cedula . ',cedula',
            'password' => 'nullable|string|min:8|confirmed', // La contraseña es opcional, solo si se desea cambiar
            'telefono' => 'nullable|string|max:20',
        ]);

        // Buscar el usuario por cedula
        $usuario = Usuario::findOrFail($cedula);

        // Actualizar el usuario
        $usuario->update([
            'genero' => $validatedData['genero'],
            'apellido' => $validatedData['apellido'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $usuario->password,
            'telefono' => $validatedData['telefono'] ?? $usuario->telefono,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cedula)
    {
        // Buscar el usuario por su cedula
        $usuario = Usuario::findOrFail($cedula);

        // Eliminar el usuario
        $usuario->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
