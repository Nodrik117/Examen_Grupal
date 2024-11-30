<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::orderBy('id', 'DESC')->paginate(3);
        return view('cita.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_paciente' => 'required', 
            'nombre_paciente' => 'required', 
            'apellido_paciente' => 'required',
            'fecha_nacimiento' => 'required|date',
            'telefono_paciente' => 'required',
            'fecha_cita' => 'required|date',
            'hora_cita' => 'required',
            'especialidad' => 'required',
            'nombre_odontologo' => 'required',
            'apellido_odontologo' => 'required'
        ]);

        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cita = Cita::find($id);
        if (!$cita) {
            return redirect()->route('citas.index')->with('error', 'Cita no encontrada.');
        }
        return view('cita.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cita = Cita::find($id);
        if (!$cita) {
            return redirect()->route('citas.index')->with('error', 'Cita no encontrada.');
        }
        return view('cita.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_paciente' => 'required', 
            'nombre_paciente' => 'required', 
            'apellido_paciente' => 'required',
            'fecha_nacimiento' => 'required|date',
            'telefono_paciente' => 'required',
            'fecha_cita' => 'required|date',
            'hora_cita' => 'required',
            'especialidad' => 'required',
            'nombre_odontologo' => 'required',
            'apellido_odontologo' => 'required'
        ]);

        $cita = Cita::find($id);
        if (!$cita) {
            return redirect()->route('citas.index')->with('error', 'Cita no encontrada.');
        }

        $cita->update($request->all());
        return redirect()->route('cita.index')->with('success', 'Cita actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cita = Cita::find($id);
        if (!$cita) {
            return redirect()->route('citas.index')->with('error', 'Cita no encontrada.');
        }

        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}
