<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Aula;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function index()
    {
        // Incidencias del usuario logueado
        $incidencias = Incidencia::where('user_id', auth()->id())->get();

        return view('incidencias.index', compact('incidencias'));
    }

    public function create()
    {
        $aulas = Aula::all();
        $dispositivos = Dispositivo::all();

        return view('incidencias.create', compact('aulas', 'dispositivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'aula_id' => 'required|exists:aulas,id',
            'dispositivo_id' => 'required|exists:dispositivos,id',
        ]);

        Incidencia::create([
            'user_id' => auth()->id(),
            'aula_id' => $request->aula_id,
            'dispositivo_id' => $request->dispositivo_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('incidencias.index');
    }

    public function edit(Incidencia $incidencia)
    {
        $this->authorize('update', $incidencia);

        $aulas = Aula::all();
        $dispositivos = Dispositivo::all();

        return view('incidencias.edit', compact('incidencia', 'aulas', 'dispositivos'));
    }

    public function update(Request $request, Incidencia $incidencia)
    {
        $this->authorize('update', $incidencia);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'aula_id' => 'required|exists:aulas,id',
            'dispositivo_id' => 'required|exists:dispositivos,id',
        ]);

        $incidencia->update($request->all());

        return redirect()->route('incidencias.index');
    }

    public function destroy(Incidencia $incidencia)
    {
        $this->authorize('delete', $incidencia);

        $incidencia->delete();

        return redirect()->route('incidencias.index');
    }
}
