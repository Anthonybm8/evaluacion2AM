@extends('layout.app')

@section('contenido')
<br>
<h1 class="text-center">Listado de Circuitos</h1>
<div class="container mt-4">
    <div class="mx-auto" style="max-width: 1000px;">
        <div class="text-right">
            <a href="{{ route('circuitos.create') }}" class="btn btn-primary">
                Agregar nuevo Circuito
            </a>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>País</th>
                        <th>Nombre</th>
                        <th>Coordenada 1</th>
                        <th>Coordenada 2</th>
                        <th>Coordenada 3</th>
                        <th>Coordenada 4</th>
                        <th>Coordenada 5</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($circuitos as $circuito)
                    <tr>
                        <td>{{ $circuito->pais }}</td>
                        <td>{{ $circuito->nombre }}</td>
                        <td>Lat: {{ $circuito->latitud1 }}<br>Lng: {{ $circuito->longitud1 }}</td>
                        <td>Lat: {{ $circuito->latitud2 }}<br>Lng: {{ $circuito->longitud2 }}</td>
                        <td>Lat: {{ $circuito->latitud3 }}<br>Lng: {{ $circuito->longitud3 }}</td>
                        <td>Lat: {{ $circuito->latitud4 }}<br>Lng: {{ $circuito->longitud4 }}</td>
                        <td>Lat: {{ $circuito->latitud5 }}<br>Lng: {{ $circuito->longitud5 }}</td>
                        <td class="text-center">
                            <a href="{{ route('circuitos.show', $circuito->id) }}" class="btn btn-sm btn-info me-1">Ver</a>
                            <a href="{{ route('circuitos.edit', $circuito->id) }}" class="btn btn-sm btn-primary me-1">Editar</a>
                            <form action="{{ route('circuitos.destroy', $circuito->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este circuito?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay circuitos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection