<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoExplora</title>
     <!--IMportando sweetalert2-->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Google Fonts + Icono -->
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/854/854878.png" type="image/png">

    <!-- Google Maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNQX31CHvoHAv2mgRTHF2C0-Hf5K2uOcg&libraries=places&callback=initMap"></script>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Nuevo Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">
                🧭 GeoExplora
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('clientes.index') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('clientes.create') }}">Nuevo Registro</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('clientes/mapa') }}">Mapa de clientes</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('predios/create') }}">Registrar predio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('predios.index') }}">ver predio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-grow-1 container py-4">
        @yield('contenido')
    </main>

    <!-- Nuevo Footer -->
    <footer class="bg-primary text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-1">🌐 GeoExplora - Tu ventana al mundo geográfico</p>
            <small>© {{ date('Y') }} GeoExplora | Desarrollado por TuNombre | Todos los derechos reservados</small>
        </div>
    </footer>

@if(session('message'))
    <script>
        Swal.fire({
            title: 'CONFIRMACIÓN',
            text: '{{ session('message') }}',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif
</body>
</html>
