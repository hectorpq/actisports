@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Barra Lateral (Sidebar) -->
        <div class="col-md-3 col-lg-2 p-0" style="background-color: #343a40;">
            <div class="d-flex flex-column align-items-center py-4">
                <!-- Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">

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

        <!-- Cuerpo Principal (Contenido) -->
        <div class="col-md-9 col-lg-10 p-4">
            <!-- Header -->
            <header class="d-flex justify-content-between align-items-center py-3" style="background-color: #ffd700; border-radius: 8px; margin-left: -16px; margin-right: -16px;">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
                </div>
            </header>

            <!-- Body Content -->
            <div class="row mt-5">
                <div class="col-md-3 mb-4">
                    <div class="card" style="cursor: pointer; transition: transform 0.2s ease;" onclick="window.location.href='{{ route('almacen') }}'">
                        <img src="{{ asset('images/almacen.jpg') }}" class="card-img-top" alt="Almacén">
                        <div class="card-body text-center">
                            <h5 class="card-title">Almacén</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card" style="cursor: pointer; transition: transform 0.2s ease;" onclick="window.location.href='servicios.html'">
                        <img src="{{ asset('images/servicios.jpg') }}" class="card-img-top" alt="Servicios">
                        <div class="card-body text-center">
                            <h5 class="card-title">Servicios</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card" style="cursor: pointer; transition: transform 0.2s ease;" onclick="window.location.href='{{ route('disenos.index') }}'">
                        <img src="{{ asset('images/disenos.jpg') }}" class="card-img-top" alt="Diseños">
                        <div class="card-body text-center">
                            <h5 class="card-title">Diseños</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card" style="cursor: pointer; transition: transform 0.2s ease;" onclick="window.location.href='contacto.html'">
                        <img src="{{ asset('images/contacto.jpg') }}" class="card-img-top" alt="Contacto">
                        <div class="card-body text-center">
                            <h5 class="card-title">Contacto</h5>
                        </div>
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
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    .nav-link:hover {
        background-color: #ff6600; /* Color más vibrante para el hover */
        color: #fff; /* Asegura que el texto permanezca blanco */
    }

    /* Efecto de cursor sobre las tarjetas */
    .card:hover {
        transform: scale(1.05); /* Agranda ligeramente la tarjeta */
    }
</style>

<script>
    gsap.from("header", { opacity: 0, duration: 1, y: -50 });
    gsap.from(".card", { opacity: 0, duration: 1, stagger: 0.2, y: 50 });
</script>
@endsection
