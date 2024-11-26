@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Barra Lateral (Sidebar) -->
        <div class="col-md-3 col-lg-2 p-0" style="background-color: #007bff;">
            <div class="d-flex flex-column align-items-center py-4">
                <!-- Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
                <h1 class="text-white mt-2"></h1>

                <!-- Menu de Navegación Lateral -->
                <nav class="mt-4">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/') }}">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('almacen') }}">
                                <i class="fas fa-box"></i> Almacén
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-cogs"></i> Servicios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('disenos.index') }}">
                                <i class="fas fa-paint-brush"></i> Diseños
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-phone-alt"></i> Contacto
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Cuerpo Principal (Contenido de Diseños) -->
        <div class="col-md-9 col-lg-10 p-4">
            <header class="d-flex justify-content-between align-items-center py-3" style="background-color: #007bff; border-radius: 8px; margin-left: -16px; margin-right: -16px;">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
                    <h1 class="text-white ml-2">- Diseños</h1>
                </div>
            </header>

            <!-- Cards de los Diseños -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($disenos as $diseno)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $diseno->imagen ? asset('storage/'.$diseno->imagen) : 'https://via.placeholder.com/150' }}" class="card-img-top" alt="Imagen del diseño" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $diseno->nombre }}</h5>
                            <p class="card-text">{{ Str::limit($diseno->descripcion, 100) }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            <small>Creado el {{ \Carbon\Carbon::parse($diseno->fecha_creacion)->format('d M, Y') }}</small>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('disenos.edit', $diseno->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('disenos.destroy', $diseno->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
                            <!-- Botón para agregar diseño -->
                            <a href="{{ route('disenos.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Diseño</a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-primary text-white py-4 mt-5" style="border-radius: 8px; margin-left: -16px; margin-right: -16px;">
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

@endsection

@push('styles')
<style>
    /* Efectos hover para los enlaces del menú lateral */
    .nav-link:hover {
        background-color: #0056b3; /* Cambia el fondo al pasar el mouse */
        transition: background-color 0.3s ease;
    }

    /* Efectos hover para los botones de editar y eliminar */
    .btn:hover {
        transform: scale(1.1); /* Aumenta ligeramente el tamaño del botón */
        transition: transform 0.3s ease;
    }

    /* Efecto hover para las cards de diseño */
    .card:hover {
        transform: translateY(-5px); /* Desplaza la card hacia arriba */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Agrega sombra a la card */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
</style>
@endpush
