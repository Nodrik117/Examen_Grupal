<?php

namespace App\Http\Controllers;

use App\Models\HistoriaClinica;
use Illuminate\Http\Request;

class HistoriasClinicasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Paginación de las historias clínicas
        $historias = HistoriaClinica::orderBy('id', 'DESC')->paginate(5);
        return view('historias_clinicas.index', compact('historias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna el formulario para crear una nueva historia clínica
        return view('historias_clinicas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos ingresados
        $request->validate([
            'fecha_creacion_historia' => 'required|date',
            'establecimiento' => 'required|string|max:255',
            'genero' => 'required|string|max:50',
            'motivo_consulta' => 'nullable|string|max:500',
            'problema_actual' => 'nullable|string',
        ]);

        // Crear la nueva historia clínica
        HistoriaClinica::create($request->all());
        return redirect()->route('historias_clinicas.index')->with('success', 'Historia clínica creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // Buscar la historia clínica por su ID
        $historia = HistoriaClinica::find($id);
        if (!$historia) {
            return redirect()->route('historias_clinicas.index')->with('error', 'Historia clínica no encontrada.');
        }
        return view('historias_clinicas.show', compact('historia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // Buscar la historia clínica por su ID
        $historia = HistoriaClinica::find($id);
        if (!$historia) {
            return redirect()->route('historias_clinicas.index')->with('error', 'Historia clínica no encontrada.');
        }
        return view('historias_clinicas.edit', compact('historia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // Validar los datos ingresados
        $request->validate([
            'fecha_creacion_historia' => 'required|date',
            'establecimiento' => 'required|string|max:255',
            'genero' => 'required|string|max:50',
            'motivo_consulta' => 'nullable|string|max:500',
            'problema_actual' => 'nullable|string',
        ]);

        // Buscar la historia clínica por su ID
        $historia = HistoriaClinica::find($id);
        if (!$historia) {
            return redirect()->route('historias_clinicas.index')->with('error', 'Historia clínica no encontrada.');
        }

        // Actualizar los datos de la historia clínica
        $historia->update($request->all());
        return redirect()->route('historias_clinicas.index')->with('success', 'Historia clínica actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // Buscar la historia clínica por su ID
        $historia = HistoriaClinica::find($id);
        if (!$historia) {
            return redirect()->route('historias_clinicas.index')->with('error', 'Historia clínica no encontrada.');
        }

        // Eliminar la historia clínica
        $historia->delete();
        return redirect()->route('historias_clinicas.index')->with('success', 'Historia clínica eliminada correctamente.');
    }
}
