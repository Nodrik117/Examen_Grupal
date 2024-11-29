<?php

namespace App\Http\Controllers;

use App\Models\Tratamientos;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $tratamientos = Tratamientos::orderBy('id_tratamiento', 'DESC')->get(); // Añadido 'get()' para ejecutar la consulta
        return view('Tratamientos.index', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna una vista con el formulario para crear un nuevo tratamiento
        return view('Tratamientos.create'); // Asume que tienes una vista llamada 'create' en la carpeta 'tratamientos'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'sesion' => 'required|string|max:255',
            'complicaciones' => 'required|string|max:255',
            'prescripciones' => 'required|string|max:255',
        ]);

        // Crear un nuevo tratamiento con los datos validados
        Tratamientos::create($validatedData);

        // Redirigir a la lista de tratamientos con un mensaje de éxito
        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscar el tratamiento por su ID
        $tratamiento = Tratamientos::findOrFail($id);

        // Retorna una vista para mostrar los detalles del tratamiento
        return view('tratamientos.show', compact('tratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Buscar el tratamiento por su ID
        $tratamiento = Tratamientos::findOrFail($id);

        // Retorna una vista con el formulario para editar el tratamiento
        return view('tratamientos.edit', compact('tratamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos recibidos
        $request->validate([
            'sesion' => 'required|string|max:255',
            'complicaciones' => 'required|string|max:255',
            'prescripciones' => 'required|string|max:1000',
        ]);

        // Buscar el tratamiento por ID y actualizarlo
        $tratamiento = Tratamientos::findOrFail($id);
        $tratamiento->update([
            'sesion' => $request->sesion,
            'complicaciones' => $request->complicaciones,
            'prescripciones' => $request->prescripciones,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el tratamiento por su ID
        $tratamiento = Tratamientos::findOrFail($id);

        // Eliminar el tratamiento
        $tratamiento->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento eliminado exitosamente.');
    }
}
