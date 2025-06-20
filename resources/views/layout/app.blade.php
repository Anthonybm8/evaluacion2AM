<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏁 Gestión de Circuitos</title>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Favicon (Icono de pista de carreras) -->
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/7216/7216048.png" type="image/png">

    <!-- Google Maps API -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&libraries=places&callback=initMap">
    </script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-size: 1.6rem;
        }
        footer {
            background: #212529;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                🏎️ Circuitos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCircuito" aria-controls="navbarCircuito" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCircuito">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('circuitos.index') }}">🏁 Ver Circuitos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('circuitos.create') }}">➕ Nuevo Circuito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">📍 Mapa Interactivo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">📊 Estadísticas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <main class="flex-grow-1 container py-4">
        @yield('contenido')
    </main>

    <!-- FOOTER -->
    <footer class="text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-1">🚦 Circuitos - Dominando la pista</p>
            <small>&copy; {{ date('Y') }} GeoExplora | Desarrollado por TuNombre | Todos los derechos reservados</small>
        </div>
    </footer>

    <!-- SweetAlert si hay mensaje -->
    @if(session('mensaje'))
        <script>
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session('mensaje') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
</body>
</html>
