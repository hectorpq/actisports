@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Barra Lateral (Sidebar) -->
        <div class="col-md-3 col-lg-2 p-0 bg-dark">
            <div class="d-flex flex-column align-items-center py-4">
                <!-- Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
                <h1 class="text-white mt-2">ActiSports</h1>

                <!-- Menu de Navegación Lateral -->
                <nav class="mt-4">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('almacen') }}">Almacén</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Diseños</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Contacto</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Cuerpo Principal (Contenido) -->
        <div class="col-md-9 col-lg-10 p-4">
            <header class="d-flex justify-content-between align-items-center py-3" style="background-color: #343a40;">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
                    <h1 class="text-white ml-2">ActiSports - Almacén</h1>
                </div>
            </header>

            <!-- Tabla de Materias Primas -->
            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Materia Prima</th>
                            <th>Nombre</th>
                            <th>Proveedor</th>
                            <th>Tipo de Tela</th>
                            <th>Color</th>
                            <th>Cantidad</th>
                            <th>Cantidad Disponible</th>
                            <th>Costo Unitario</th>
                            <th>Medida</th>
                            <th>Acciones</th> <!-- Nueva columna para las acciones -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materials as $material)
                        <tr>
                            <td>{{ $material->id_materia_prima }}</td>
                            <td>{{ $material->nombre_materia_prima }}</td>
                            <td>{{ $material->proveedor }}</td>
                            <td>{{ $material->tipo_tela }}</td>
                            <td>{{ $material->color }}</td>
                            <td>{{ $material->cantidad }}</td>
                            <td>{{ $material->cantidad_disponible }}</td>
                            <td>{{ $material->costo_unitario }}</td>
                            <td>{{ $material->medida }}</td>
                            <td>
                                <!-- Botones de Editar y Eliminar -->
                                <a href="{{ route('almacen.edit', $material->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('almacen.destroy', $material->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Formulario para Agregar Material (oculto al inicio) -->
            <div class="card mt-4" id="add-material-form" style="display:none;">
                <div class="card-header">
                    <h5>Agregar Nuevo Material</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('almacen.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_tela">Tipo de Tela</label>
                                    <input type="text" class="form-control" id="tipo_tela" name="tipo_tela" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad_disponible">Cantidad Disponible</label>
                                    <input type="number" class="form-control" id="cantidad_disponible" name="cantidad_disponible" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" id="color" name="color" required>
                                </div>
                                <div class="form-group">
                                    <label for="costo_unitario">Costo Unitario</label>
                                    <input type="number" step="0.01" class="form-control" id="costo_unitario" name="costo_unitario" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_materia_prima">ID Materia Prima</label>
                                    <input type="text" class="form-control" id="id_materia_prima" name="id_materia_prima" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_materia_prima">Nombre de Materia Prima</label>
                                    <input type="text" class="form-control" id="nombre_materia_prima" name="nombre_materia_prima" required>
                                </div>
                                <div class="form-group">
                                    <label for="proveedor">Proveedor</label>
                                    <input type="text" class="form-control" id="proveedor" name="proveedor" required>
                                </div>
                                <div class="form-group">
                                    <label for="medida">Medida</label>
                                    <input type="text" class="form-control" id="medida" name="medida" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar Material</button>
                    </form>
                </div>
            </div>

            <!-- Botón para Mostrar Formulario de Agregar Material -->
            <button class="btn btn-success mt-4" onclick="toggleAddForm()">Agregar Material</button>

            <!-- Footer -->
            <footer class="bg-dark text-white py-4 mt-5">
                <div class="container text-center">
                    <p>&copy; 2024 ActiSports. Todos los derechos reservados.</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-white">Política de privacidad</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white">Términos de uso</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white">Síguenos en redes sociales</a>
                        </li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</div>

<script>
    // Función para mostrar u ocultar el formulario de agregar material
    function toggleAddForm() {
        var form = document.getElementById('add-material-form');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>

@endsection
