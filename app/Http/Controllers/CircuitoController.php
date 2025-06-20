<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Circuito;

class CircuitoController extends Controller
{
    /**
     * Mostrar un listado de circuitos
     */
    public function index()
    {
        $circuitos = Circuito::all();
        return view('circuito.index', compact('circuitos'));
    }

    /**
     * Mostrar el formulario para crear un nuevo circuito
     */
    public function create()
    {
        return view('circuito.crear');
    }

    /**
     * Almacenar un circuito recién creado
     */
    public function store(Request $request)
    {
        $datos = [
            'pais' => $request->pais,
            'nombre' => $request->nombre,
            'latitud1' => $request->latitud1,
            'longitud1' => $request->longitud1,
            'latitud2' => $request->latitud2,
            'longitud2' => $request->longitud2,
            'latitud3' => $request->latitud3,
            'longitud3' => $request->longitud3,
            'latitud4' => $request->latitud4,
            'longitud4' => $request->longitud4,
            'latitud5' => $request->latitud5,
            'longitud5' => $request->longitud5
        ];
        
        Circuito::create($datos);
        return redirect()->route('circuitos.index')->with('mensaje', 'Circuito creado exitosamente');
    }

    /**
     * Mostrar un circuito específico
     */
    public function show(string $id)
    {
        $circuito = Circuito::findOrFail($id);
        return view('circuito.mostrar', compact('circuito'));
    }

    /**
     * Mostrar el formulario para editar un circuito
     */
    public function edit(string $id)
    {
        $circuito = Circuito::findOrFail($id);
        return view('circuito.editar', compact('circuito'));
    }

    /**
     * Actualizar un circuito específico
     */
    public function update(Request $request, string $id)
    {
        $circuito = Circuito::findOrFail($id);
        $circuito->update([
            'pais' => $request->pais,
            'nombre' => $request->nombre,
            'latitud1' => $request->latitud1,
            'longitud1' => $request->longitud1,
            'latitud2' => $request->latitud2,
            'longitud2' => $request->longitud2,
            'latitud3' => $request->latitud3,
            'longitud3' => $request->longitud3,
            'latitud4' => $request->latitud4,
            'longitud4' => $request->longitud4,
            'latitud5' => $request->latitud5,
            'longitud5' => $request->longitud5
        ]);

        return redirect()->route('circuitos.index')->with('mensaje', 'Circuito eliminado correctamente');
    }

    /**
     * Eliminar un circuito específico
     */
    public function destroy(string $id)
    {
        $circuito = Circuito::findOrFail($id);
        $circuito->delete();
    
        return redirect()->route('circuitos.index')->with('mensaje', 'Circuito eliminado correctamente');
    }
}