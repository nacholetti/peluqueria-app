<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Peluquero;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    // Mostrar formulario de reserva para un peluquero específico
    public function createConPeluquero($peluquero_id)
    {
        $peluquero = Peluquero::findOrFail($peluquero_id);
        $servicios = Servicio::all();

        return view('turnos.create', compact('peluquero', 'servicios'));
    }

    // Guardar turno en la base de datos
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'servicio_id' => 'required|exists:servicios,id',
            'peluquero_id' => 'required|exists:peluqueros,id',
            'fecha' => 'required|date',
            'hora' => 'required'
        ]);
        
        // Crear cliente
        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono
        ]);

        // Crear turno asociado a cliente, servicio y peluquero
        Turno::create([
            'cliente_id' => $cliente->id,
            'servicio_id' => $request->servicio_id,
            'peluquero_id' => $request->peluquero_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'estado' => 'pendiente'
        ]);

        return redirect()->back()->with('success', 'Turno reservado correctamente.');
    }
}
