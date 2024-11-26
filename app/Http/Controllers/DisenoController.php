<?php

namespace App\Http\Controllers;

use App\Models\Diseno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DisenoController extends Controller
{
    public function index()
    {
        // Obtener todos los diseños
        $disenos = Diseno::all();  
        return view('disenos.index', compact('disenos'));
    }

    public function create()
    {
        // Mostrar el formulario de creación
        return view('disenos.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_creacion' => 'required|date',
            'autor' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo',
            'talla' => 'required|string|max:100',
            'genero' => 'required|in:masculino,femenino',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validación para la imagen
        ]);

        // Subir la imagen si existe
        if ($request->hasFile('imagen')) {
            // Guardar la imagen en el directorio 'public/disenos'
            $imagenPath = $request->file('imagen')->store('public/disenos');
            
            // Crear el nuevo diseño
            $diseno = new Diseno();
            $diseno->nombre = $request->nombre;
            $diseno->descripcion = $request->descripcion;
            $diseno->fecha_creacion = $request->fecha_creacion;
            $diseno->autor = $request->autor;
            $diseno->estado = $request->estado;
            $diseno->talla = $request->talla;
            $diseno->genero = $request->genero;
            $diseno->imagen = $imagenPath;  // Guardar la ruta de la imagen
            $diseno->save();
    
            return redirect()->route('disenos.index')->with('success', 'Diseño guardado exitosamente!');
        }

        // Si no se sube imagen, redirigir con un error
        return back()->withErrors(['imagen' => 'La imagen es requerida']);
    }

    public function edit($id)
    {
        // Obtener el diseño por su ID
        $diseno = Diseno::findOrFail($id);  
        return view('disenos.edit', compact('diseno'));  // Mostrar el formulario de edición
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_creacion' => 'required|date',
            'autor' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo',
            'talla' => 'required|string|max:50',
            'genero' => 'required|in:masculino,femenino',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validación opcional para la imagen
        ]);

        // Obtener el diseño a editar
        $diseno = Diseno::findOrFail($id); 

        // Verificar si se sube una nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($diseno->imagen && Storage::exists($diseno->imagen)) {
                Storage::delete($diseno->imagen);
            }

            // Subir la nueva imagen
            $imagenPath = $request->file('imagen')->store('public/disenos');
            $diseno->imagen = $imagenPath;
        }

        // Actualizar los demás campos del diseño
        $diseno->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_creacion' => $request->fecha_creacion,
            'autor' => $request->autor,
            'estado' => $request->estado,
            'talla' => $request->talla,
            'genero' => $request->genero,
        ]);

        // Redirigir a la página de listado de diseños
        return redirect()->route('disenos.index')->with('success', 'Diseño actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Obtener el diseño a eliminar
        $diseno = Diseno::findOrFail($id);

        // Eliminar la imagen si existe
        if ($diseno->imagen && Storage::exists($diseno->imagen)) {
            Storage::delete($diseno->imagen);
        }

        // Eliminar el diseño
        $diseno->delete();

        return redirect()->route('disenos.index')->with('success', 'Diseño eliminado exitosamente.');
    }
}
