@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Barra Lateral (Sidebar) -->
        <div class="col-md-3 col-lg-2 p-0 bg-dark">
            <div class="d-flex flex-column align-items-center py-4">
                <!-- Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
                <h1 class="text-white mt-2">ActiSports</h1>

                <!-- Menú de Navegación Lateral -->
                <nav class="mt-4">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('almacen') }}">Almacén</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Diseños</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Formulario de Edición -->
        <div class="col-md-9 col-lg-10 p-4">
            <h3>Editar Material</h3>

            <!-- Formulario de edición -->
            <form action="{{ route('almacen.update', $material->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="tipo_tela">Tipo de Tela</label>
                    <input type="text" name="tipo_tela" class="form-control" value="{{ $material->tipo_tela }}">
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" value="{{ $material->descripcion }}">
                </div>
                
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" value="{{ $material->cantidad }}">
                </div>
                
                <div class="form-group">
                    <label for="cantidad_disponible">Cantidad Disponible</label>
                    <input type="number" name="cantidad_disponible" class="form-control" value="{{ $material->cantidad_disponible }}">
                </div>
                
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" class="form-control" value="{{ $material->color }}">
                </div>
                
                <div class="form-group">
                    <label for="costo_unitario">Costo Unitario</label>
                    <input type="number" step="0.01" name="costo_unitario" class="form-control" value="{{ $material->costo_unitario }}">
                </div>
                
                <div class="form-group">
                    <label for="id_materia_prima">ID Materia Prima</label>
                    <input type="text" name="id_materia_prima" class="form-control" value="{{ $material->id_materia_prima }}">
                </div>
                
                <div class="form-group">
                    <label for="nombre_materia_prima">Nombre de la Materia Prima</label>
                    <input type="text" name="nombre_materia_prima" class="form-control" value="{{ $material->nombre_materia_prima }}">
                </div>
                
                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <input type="text" name="proveedor" class="form-control" value="{{ $material->proveedor }}">
                </div>
                
                <div class="form-group">
                    <label for="medida">Medida</label>
                    <input type="text" name="medida" class="form-control" value="{{ $material->medida }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
