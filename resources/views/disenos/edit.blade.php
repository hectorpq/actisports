@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Diseño</h1>

    <form action="{{ route('disenos.update', $diseno->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Método para actualizar el recurso -->
        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $diseno->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion', $diseno->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="date" name="fecha_creacion" class="form-control" value="{{ old('fecha_creacion', $diseno->fecha_creacion) }}" required>
        </div>

        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ old('autor', $diseno->autor) }}" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="activo" {{ old('estado', $diseno->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $diseno->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="talla">Talla</label>
            <input type="text" name="talla" class="form-control" value="{{ old('talla', $diseno->talla) }}" required>
        </div>

        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" class="form-control" required>
                <option value="masculino" {{ old('genero', $diseno->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ old('genero', $diseno->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Diseño</button>
    </form>
</div>
@endsection
