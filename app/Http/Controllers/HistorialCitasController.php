<?php

namespace App\Http\Controllers;

use App\Models\HistorialCitas;
use Illuminate\Http\Request;

class HistorialCitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los registros de historial de citas, ordenados por id de forma descendente
        $historialCitas = HistorialCitas::orderBy('id', 'DESC')->get();
        return view('historial_citas.index', compact('historialCitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna una vista con el formulario para crear un nuevo historial de cita
        return view('historial_citas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'motivo' => 'required|string|max:255',
            'observaciones' => 'required|string|max:255',
            'duracion' => 'required',
            'tratamiento_realizado' => 'required|string|max:255',
        ]);

        // Crear un nuevo historial de cita con los datos validados
        HistorialCitas::create([
            'motivo' => $validatedData['motivo'],
            'observaciones' => $validatedData['observaciones'],
            'duracion' => $validatedData['duracion'],
            'tratamiento_realizado' => $validatedData['tratamiento_realizado'],
        ]);

        // Redirigir a la lista de historial de citas con un mensaje de éxito
        return redirect()->route('historial_citas.index')->with('success', 'Cita registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorialCitas $historialCita)
    {
        // Retorna una vista con los detalles del historial de cita
        return view('historial_citas.show', compact('historialCita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorialCitas $historialCita)
    {
        // Retorna una vista con el formulario para editar el historial de cita
        return view('historial_citas.edit', compact('historialCita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorialCitas $historialCita)
    {
        // Validación de los datos recibidos
        $validatedData = $request->validate([
            'motivo' => 'required|string|max:255',
            'observaciones' => 'required|string|max:255',
            'duracion' => 'required',
            'tratamiento_realizado' => 'required|string|max:255',
        ]);

        // Actualizar el historial de cita
        $historialCita->update([
            'motivo' => $validatedData['motivo'],
            'observaciones' => $validatedData['observaciones'],
            'duracion' => $validatedData['duracion'],
            'tratamiento_realizado' => $validatedData['tratamiento_realizado'],
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('historial_citas.index')->with('success', 'Cita actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialCitas $historialCita)
    {
        // Eliminar el historial de cita
        $historialCita->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('historial_citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
}
