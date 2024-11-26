<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class AlmacenController extends Controller
{
    // Muestra todos los materiales en el almacén
    public function index()
    {
        // Obtener todos los materiales de la base de datos
        $materials = Material::all();
        return view('almacen.index', compact('materials'));
    }

    // Muestra el formulario para crear un nuevo material
    public function create()
    {
        return view('almacen.create');
    }

    // Guarda un nuevo material en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'tipo_tela' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'cantidad_disponible' => 'required|integer',
            'color' => 'required|string|max:50',
            'costo_unitario' => 'required|numeric',
            'id_materia_prima' => 'required|string|max:50',
            'nombre_materia_prima' => 'required|string|max:255',
            'proveedor' => 'required|string|max:255',
            'medida' => 'required|string|max:50',
        ]);

        // Buscar si existe un material con los mismos datos clave
        $existingMaterial = Material::where('id_materia_prima', $validated['id_materia_prima'])
                                    ->where('nombre_materia_prima', $validated['nombre_materia_prima'])
                                    ->where('proveedor', $validated['proveedor'])
                                    ->where('tipo_tela', $validated['tipo_tela'])
                                    ->where('color', $validated['color'])
                                    ->first();

        if ($existingMaterial) {
            // Si existe, sumar la cantidad y la cantidad disponible
            $existingMaterial->cantidad += $validated['cantidad'];
            $existingMaterial->cantidad_disponible += $validated['cantidad_disponible'];
            $existingMaterial->save();
        } else {
            // Si no existe, crear un nuevo registro
            Material::create($validated);
        }

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('almacen')->with('success', 'Material agregado exitosamente.');
    }

    // Muestra el formulario para editar un material
    public function edit($id)
    {
        // Obtener el material específico por ID
        $material = Material::findOrFail($id);
        return view('almacen.edit', compact('material'));
    }

    // Actualiza los datos de un material
    public function update(Request $request, $id)
    {
        // Validación de datos
        $validated = $request->validate([
            'tipo_tela' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'cantidad_disponible' => 'required|integer',
            'color' => 'required|string|max:50',
            'costo_unitario' => 'required|numeric',
            'id_materia_prima' => 'required|string|max:50',
            'nombre_materia_prima' => 'required|string|max:255',
            'proveedor' => 'required|string|max:255',
            'medida' => 'required|string|max:50',
        ]);

        // Actualizar el material
        $material = Material::findOrFail($id);
        $material->update($validated);
        return redirect()->route('almacen.index')->with('success', 'Material actualizado exitosamente.');
    }

    // Elimina un material
    public function destroy($id)
    {
        // Eliminar material
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->route('almacen.index')->with('success', 'Material eliminado exitosamente.');
    }
}
