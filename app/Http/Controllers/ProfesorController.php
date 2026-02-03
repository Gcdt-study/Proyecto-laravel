<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\User;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::with('user')->get();
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        // Solo usuarios que NO tienen profesor asociado
        $users = User::doesntHave('profesor')->get();
        return view('profesores.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:profesores,user_id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        Profesor::create([
            'user_id' => $request->user_id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'es_tde' => $request->has('es_tde'),
        ]);

        return redirect()->route('profesores.index');
    }

    public function edit(Profesor $profesor)
    {
        // NO se debe permitir cambiar el usuario asociado
        return view('profesores.edit', compact('profesor'));
    }

    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $profesor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'es_tde' => $request->has('es_tde'),
        ]);

        return redirect()->route('profesores.index');
    }

    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        return redirect()->route('profesores.index');
    }
}
