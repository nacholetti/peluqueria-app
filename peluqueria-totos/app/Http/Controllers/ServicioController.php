<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

   public function create()
{
    $servicios = Servicio::all(); // Trae todos los servicios para el select
    return view('turnos.create', compact('servicios'));
}


    public function store(Request $request)
    {
        Servicio::create($request->all());
        return redirect()->route('servicios.index');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->update($request->all());
        return redirect()->route('servicios.index');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
}
