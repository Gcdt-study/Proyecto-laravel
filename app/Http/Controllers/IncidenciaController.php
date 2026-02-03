<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Aula;
use App\Models\Dispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\IncidenciaResueltaMail;

class IncidenciaController extends Controller
{
    public function index()
{
    // Si es TDE, ve todas las incidencias
    if (auth()->user()->profesor->es_tde) {
        $incidencias = Incidencia::with(['aula', 'dispositivo', 'user'])->get();
    } 
    // Si NO es TDE, solo ve las suyas
    else {
        $incidencias = Incidencia::with(['aula', 'dispositivo'])
            ->where('user_id', auth()->id())
            ->get();
    }

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

public function show(Incidencia $incidencia)
{
    $this->authorize('view', $incidencia);

    return view('incidencias.show', compact('incidencia'));
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

        $incidencia->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'aula_id' => $request->aula_id,
            'dispositivo_id' => $request->dispositivo_id,
        ]);

        return redirect()->route('incidencias.index');
    }

    public function destroy(Incidencia $incidencia)
    {
        $this->authorize('delete', $incidencia);

        $incidencia->delete();

        return redirect()->route('incidencias.index');
    }

   public function resolver(Request $request, Incidencia $incidencia)
{

    $this->authorize('resolve', $incidencia);

    // Solo TDE puede resolver incidencias
    if (!auth()->user()->profesor->es_tde) {
        abort(403, 'No autorizado');
    }

    // Validar comentario
    $request->validate([
        'comentario_resolucion' => 'required|string',
    ]);

    // Actualizar incidencia
    $incidencia->estado = 'resuelta';
    $incidencia->comentario_resolucion = $request->comentario_resolucion;
    $incidencia->fecha_resolucion = now();
    $incidencia->save();

    // Enviar correo al profesor que creó la incidencia

   
Mail::to($incidencia->user->email)->send(
    new \App\Mail\IncidenciaResueltaMail($incidencia)
);



    return redirect()
        ->route('incidencias.show', $incidencia)
        ->with('success', 'Incidencia resuelta correctamente.');
}

}
