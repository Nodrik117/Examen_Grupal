<?php

namespace App\Http\Controllers;

use App\Models\SignosVitales;
use Illuminate\Http\Request;

class SignosVitalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signosVitales = SignosVitales::orderBy('id_signosVitales', 'DESC')->get();
        return view('signosvitales.index', compact('signosVitales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signosvitales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'presion_arterial' => 'required|numeric',
            'frecuencia_cardiaca' => 'required|numeric',
            'temperatura' => 'required|numeric',
            'frecuencia_respiratoria' => 'required|numeric',
        ]);

        SignosVitales::create($validatedData);

        return redirect()->route('signos-vitales.index')->with('success', 'Signos vitales registrados exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $signosVitales = SignosVitales::findOrFail($id);
        return view('signos_vitales.show', compact('signosVitales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $signosVitales = SignosVitales::findOrFail($id);
        return view('signosvitales.edit', compact('signosVitales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'presion_arterial' => 'required|numeric',
            'frecuencia_cardiaca' => 'required|numeric',
            'temperatura' => 'required|numeric',
            'frecuencia_respiratoria' => 'required|numeric',
        ]);

        $signosVitales = SignosVitales::findOrFail($id);
        $signosVitales->update($validatedData);

        return redirect()->route('signos-vitales.index')->with('success', 'Signos vitales actualizados exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $signosVitales = SignosVitales::findOrFail($id);
        $signosVitales->delete();

        return redirect()->route('signos-vitales.index')->with('success', 'Signos vitales eliminados exitosamente.');
    }
}
