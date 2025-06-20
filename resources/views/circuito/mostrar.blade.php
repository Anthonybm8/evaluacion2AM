@extends('layout.app')

@section('contenido')
<h1 class="text-center">Detalles del Circuito</h1>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 bg-white text-black p-4 rounded">
        <div class="mb-3">
            <label><b>País:</b></label>
            <p>{{ $circuito->pais }}</p>
        </div>

        <div class="mb-3">
            <label><b>Nombre del Circuito:</b></label>
            <p>{{ $circuito->nombre }}</p>
        </div>

        <div class="mb-3">
            <h4>Coordenadas:</h4>
            <div class="row">
                @for($i = 1; $i <= 5; $i++)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <b>Coordenada N°{{ $i }}</b>
                        </div>
                        <div class="card-body">
                            <p>Latitud: {{ $circuito->{'latitud'.$i} }}</p>
                            <p>Longitud: {{ $circuito->{'longitud'.$i} }}</p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('circuitos.edit', $circuito->id) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('circuitos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <div id="mapa-circuito" style="height: 500px; width:100%; border:2px solid blue;"></div>
    </div>
</div>

<script>
    function initMap() {
        // Coordenadas del circuito
        const coords = [
            { lat: {{ $circuito->latitud1 }}, lng: {{ $circuito->longitud1 }} },
            { lat: {{ $circuito->latitud2 }}, lng: {{ $circuito->longitud2 }} },
            { lat: {{ $circuito->latitud3 }}, lng: {{ $circuito->longitud3 }} },
            { lat: {{ $circuito->latitud4 }}, lng: {{ $circuito->longitud4 }} },
            { lat: {{ $circuito->latitud5 }}, lng: {{ $circuito->longitud5 }} }
        ];

        // Filtrar coordenadas válidas
        const coordenadasValidas = coords.filter(coord => coord.lat && coord.lng);

        // Crear mapa
        const map = new google.maps.Map(document.getElementById("mapa-circuito"), {
            zoom: 15,
            center: coordenadasValidas[0],
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // Crear marcadores para cada coordenada
        coordenadasValidas.forEach((coord, index) => {
            new google.maps.Marker({
                position: coord,
                map: map,
                title: `Coordenada ${index + 1}`,
                label: (index + 1).toString()
            });
        });

        // Crear polígono si hay suficientes coordenadas
        if (coordenadasValidas.length >= 3) {
            const poligono = new google.maps.Polygon({
                paths: coordenadasValidas,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#00FF00",
                fillOpacity: 0.35,
            });

            poligono.setMap(map);

            // Ajustar zoom para mostrar todo el polígono
            const bounds = new google.maps.LatLngBounds();
            coordenadasValidas.forEach(coord => bounds.extend(coord));
            map.fitBounds(bounds);
        }
    }

    window.addEventListener('load', initMap);
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV-hhnGIiWpn19hxGsr3NpUv7yFXaqFCU&callback=initMap">
</script>
@endsection