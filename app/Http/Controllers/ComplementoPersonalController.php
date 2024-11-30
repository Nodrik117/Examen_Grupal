<?php

namespace App\Http\Controllers;

use App\Models\ComplementoPersonal;
use Illuminate\Http\Request;

class ComplementoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complementos = ComplementoPersonal::orderBy('id', 'DESC')->paginate(3);
        return view('complementos_personales.index', compact('complementos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('complementos_personales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'labios' => 'nullable|string',
            'mejillas' => 'nullable|string',
            'maxilar_superior' => 'nullable|string',
            'maxilar_inferior' => 'nullable|string',
            'lengua' => 'nullable|string',
            'paladar_duro' => 'nullable|string',
            'paladar_blando' => 'nullable|string',
            'piso_boca' => 'nullable|string',
            'amigdalas' => 'nullable|string',
            'frenillo_labial' => 'nullable|string',
            'frenillo_lingual' => 'nullable|string',
            'lesiones_orales' => 'nullable|boolean',
            'descripcion_lesiones_orales' => 'nullable|string',
            'higiene_oral' => 'nullable|string',
            'observaciones_generales' => 'nullable|string',
            'estado_general' => 'nullable|string',
        ]);

        ComplementoPersonal::create($request->all());
        return redirect()->route('complementos_personales.index')->with('success', 'Complemento personal creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $complemento = ComplementoPersonal::find($id);
        if (!$complemento) {
            return redirect()->route('complementos_personales.index')->with('error', 'Complemento personal no encontrado.');
        }
        return view('complementos_personales.show', compact('complemento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $complemento = ComplementoPersonal::find($id);
        if (!$complemento) {
            return redirect()->route('complementos_personales.index')->with('error', 'Complemento personal no encontrado.');
        }
        return view('complementos_personales.edit', compact('complemento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'labios' => 'nullable|string',
            'mejillas' => 'nullable|string',
            'maxilar_superior' => 'nullable|string',
            'maxilar_inferior' => 'nullable|string',
            'lengua' => 'nullable|string',
            'paladar_duro' => 'nullable|string',
            'paladar_blando' => 'nullable|string',
            'piso_boca' => 'nullable|string',
            'amigdalas' => 'nullable|string',
            'frenillo_labial' => 'nullable|string',
            'frenillo_lingual' => 'nullable|string',
            'lesiones_orales' => 'nullable|boolean',
            'descripcion_lesiones_orales' => 'nullable|string',
            'higiene_oral' => 'nullable|string',
            'observaciones_generales' => 'nullable|string',
            'estado_general' => 'nullable|string',
        ]);

        $complemento = ComplementoPersonal::find($id);
        if (!$complemento) {
            return redirect()->route('complementos_personales.index')->with('error', 'Complemento personal no encontrado.');
        }

        $complemento->update($request->all());
        return redirect()->route('complementos_personales.index')->with('success', 'Complemento personal actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $complemento = ComplementoPersonal::find($id);
        if (!$complemento) {
            return redirect()->route('complementos_personales.index')->with('error', 'Complemento personal no encontrado.');
        }

        $complemento->delete();
        return redirect()->route('complementos_personales.index')->with('success', 'Complemento personal eliminado correctamente.');
    }
}
