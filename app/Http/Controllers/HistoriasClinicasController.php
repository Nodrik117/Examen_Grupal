<?php

namespace App\Http\Controllers;

use App\Models\HistoriasClinicas;
use Illuminate\Http\Request;

class HistoriasClinicasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historias = HistoriasClinicas::orderBy('id_historiaclinica', 'DESC')->paginate(3);
        return view('historias_clinicas.index', compact('historias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('historias_clinicas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_creacion_historia' => 'required|date',
            'establecimiento' => 'required|string|max:50',
            'genero' => 'required|string|max:50',
            'motivo_consulta' => 'nullable|string|max:200',
            'problema_actual' => 'nullable|string|max:200',
        ]);

        HistoriasClinicas::create($request->all());
        return redirect()->route('historias_clinicas.index')->with('success', 'Historia clínica creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $historia = HistoriasClinicas::find($id);
        if (!$historia) {
            return redirect()->route('historias_clinicas.index')->with('error', 'Historia clínica no encontrada.');
        }
        return view('historias_clinicas.show', compact('historia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $historia = HistoriasClinicas::find($id);
        if (!$historia) {
            return redirect()->route('historias_clinicas.index')->with('error', 'Historia clínica no encontrada.');
        }
        return view('historias_clinicas.edit', compact('historia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fecha_creacion_historia' => 'required|date',
            'establecimiento' => 'required|string|max:50',
            'genero' => 'required|string|max:50',
            'motivo_consulta' => 'nullable|string|max:200',
            'problema_actual' => 'nullable|string|max:200',
        ]);

        $historia = HistoriasClinicas::find($id);
        if (!$historia) {
            return redirect()->route('historias_clinicas.index')->with('error', 'Historia clínica no encontrada.');
        }

        $historia->update($request->all());
        return redirect()->route('historias_clinicas.index')->with('success', 'Historia clínica actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $historia = HistoriasClinicas::find($id);
        if (!$historia) {
            return redirect()->route('historias_clinicas.index')->with('error', 'Historia clínica no encontrada.');
        }

        $historia->delete();
        return redirect()->route('historias_clinicas.index')->with('success', 'Historia clínica eliminada correctamente.');
    }
}
