@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Nuevo Diseño</h1>

    <form action="{{ route('disenos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        </div>

        <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="date" name="fecha_creacion" class="form-control" value="{{ old('fecha_creacion') }}" required>
        </div>

        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ old('autor') }}" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="talla">Talla</label>
            <input type="text" name="talla" class="form-control" value="{{ old('talla') }}" required>
        </div>

        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" class="form-control" required>
                <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <!-- Campo para subir imagen -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Diseño</button>
    </form>

    @if (session('imagen_path'))
        <div class="mt-4">
            <h3>Imagen Subida</h3>
            <img src="{{ asset('storage/' . session('imagen_path')) }}" alt="Imagen del diseño" class="img-fluid">
        </div>
    @endif
</div>
@endsection
