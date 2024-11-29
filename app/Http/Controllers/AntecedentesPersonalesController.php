<?php

namespace App\Http\Controllers;
use App\Models\AntecedentesPersonales;
use Illuminate\Http\Request;

class AntecedentesPersonalesController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        // Obtener todos los antecedentes personales
        $antecedentes = AntecedentesPersonales::all();

        return view('antecedentes.index', compact('antecedentes'));
    }
   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       // Retorna la vista para crear antecedentes personales
       return view('antecedentes.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       // Validar los datos del formulario
       $validatedData = $request->validate([
           'alergia_antibiotico' => 'required|boolean',
           'alergia_anestesia' => 'required|boolean',
           'asma' => 'required|boolean',
           'diabetes' => 'required|boolean',
           'hipertension' => 'required|boolean',
           'enfermedad_cardiaca' => 'required|boolean',
           'otros_antecedentes' => 'nullable|string|max:255',
       ]);

       // Crear un nuevo antecedente personal con los datos validados
       AntecedentesPersonales::create($validatedData);

       // Redirigir con mensaje de éxito
       return redirect()->route('antecedentes.index')->with('success', 'Antecedentes personales creados exitosamente.');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
       // Buscar el antecedente por ID
       $antecedente = AntecedentesPersonales::findOrFail($id);

       // Retornar vista para mostrar los detalles del antecedente
       return view('antecedentes.show', compact('antecedente'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
       // Buscar el antecedente por ID
       $antecedente = AntecedentesPersonales::findOrFail($id);

       // Retorna la vista para editar el antecedente
       return view('antecedentes.edit', compact('antecedente'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
       // Validar los datos del formulario
       $validatedData = $request->validate([
           'alergia_antibiotico' => 'required|boolean',
           'alergia_anestesia' => 'required|boolean',
           'asma' => 'required|boolean',
           'diabetes' => 'required|boolean',
           'hipertension' => 'required|boolean',
           'enfermedad_cardiaca' => 'required|boolean',
           'otros_antecedentes' => 'nullable|string|max:255',
       ]);

       // Buscar el antecedente por ID y actualizarlo
       $antecedente = AntecedentesPersonales::findOrFail($id);
       $antecedente->update($validatedData);

       // Redirigir con mensaje de éxito
       return redirect()->route('antecedentes.index')->with('success', 'Antecedentes personales actualizados exitosamente.');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
       // Buscar el antecedente por ID
       $antecedente = AntecedentesPersonales::findOrFail($id);

       // Eliminar el antecedente
       $antecedente->delete();

       // Redirigir con mensaje de éxito
       return redirect()->route('antecedentes.index')->with('success', 'Antecedente personal eliminado exitosamente.');
   }
}
