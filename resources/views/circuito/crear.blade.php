@extends('layout.app')

@section('contenido')
<h1>Registrar nuevo circuito</h1>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="{{ route('circuitos.store') }}" method="POST">
            @csrf
            <label><b>País:</b></label>
            <input type="text" name="pais" class="form-control" required placeholder="Ingrese el país">
            <br>
            <label><b>Nombre del Circuito:</b></label>
            <input type="text" name="nombre" class="form-control" required placeholder="Ingrese el nombre del circuito">
            <br>

            @for($i = 1; $i <= 5; $i++)
            <div class="row mb-4">
                <div class="col-md-5">
                    <label><b>COORDENADA N°{{ $i }}</b></label><br>
                    <label>Latitud</label>
                    <input type="number" step="any" name="latitud{{ $i }}" id="latitud{{ $i }}" class="form-control" readonly placeholder="Seleccione en el mapa">
                    <label>Longitud</label>
                    <input type="number" step="any" name="longitud{{ $i }}" id="longitud{{ $i }}" class="form-control" readonly placeholder="Seleccione en el mapa">
                </div>
                <div class="col-md-7">
                    <label>&nbsp;</label>
                    <div id="mapa{{ $i }}" style="border:2px solid #ddd; height:200px; width:100%"></div>
                </div>
            </div>
            @endfor

            <center>
                <button class="btn btn-success" type="submit">Guardar</button>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('circuitos.index') }}" class="btn btn-danger">Cancelar</a>
                &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-primary" onclick="graficarCircuito();">Graficar Circuito</button>
            </center>
        </form>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <div id="mapa-poligono" style="height: 500px; width:100%; border:2px solid blue;"></div>
    </div>
</div>

<script>
    let mapaPoligono;

    function initMap() {
        const latitudInicial = -0.9374805;
        const longitudInicial = -78.6161327;

        // Inicializar los 5 mapas con marcadores
        for (let i = 1; i <= 5; i++) {
            const map = new google.maps.Map(document.getElementById('mapa' + i), {
                center: { lat: latitudInicial, lng: longitudInicial },
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            const marker = new google.maps.Marker({
                position: { lat: latitudInicial, lng: longitudInicial },
                map: map,
                title: `Seleccione coordenada ${i}`,
                draggable: true
            });

            marker.addListener('dragend', function() {
                document.getElementById('latitud' + i).value = this.getPosition().lat();
                document.getElementById('longitud' + i).value = this.getPosition().lng();
            });
        }

        // Mapa para mostrar el polígono
        mapaPoligono = new google.maps.Map(
            document.getElementById("mapa-poligono"), {
                zoom: 15,
                center: { lat: latitudInicial, lng: longitudInicial },
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
    }

    function graficarCircuito() {
        const coordenadas = [];

        for (let i = 1; i <= 5; i++) {
            const lat = parseFloat(document.getElementById('latitud' + i).value);
            const lng = parseFloat(document.getElementById('longitud' + i).value);
            if (!isNaN(lat) && !isNaN(lng)) {
                coordenadas.push({ lat: lat, lng: lng });
            }
        }

        if (coordenadas.length >= 3) {
            // Limpiar mapa anterior
            if (window.poligono) {
                window.poligono.setMap(null);
            }

            // Crear nuevo polígono
            window.poligono = new google.maps.Polygon({
                paths: coordenadas,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#00FF00",
                fillOpacity: 0.35,
            });

            window.poligono.setMap(mapaPoligono);
            
            // Centrar el mapa en el polígono
            const bounds = new google.maps.LatLngBounds();
            coordenadas.forEach(coord => bounds.extend(coord));
            mapaPoligono.fitBounds(bounds);
        } else {
            alert("Se necesitan al menos 3 coordenadas para graficar un circuito");
        }
    }

    window.addEventListener('load', initMap);
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap">
</script>
@endsection