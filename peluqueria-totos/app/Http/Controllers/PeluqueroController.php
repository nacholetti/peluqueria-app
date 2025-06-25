<?php
namespace App\Http\Controllers;

use App\Models\Peluquero;
use Illuminate\Http\Request;

class PeluqueroController extends Controller
{
    public function index()
    {
        $peluqueros = Peluquero::all();
        return view('peluqueros.index', compact('peluqueros'));
    }

    public function create()
    {
        return view('peluqueros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'foto' => 'required|image|max:2048'
        ]);

        $path = $request->file('foto')->store('peluqueros', 'public');

        Peluquero::create([
            'nombre' => $request->nombre,
            'foto' => $path,
        ]);

        return redirect()->route('peluqueros.index')->with('success', 'Peluquero creado correctamente');
    }
}
