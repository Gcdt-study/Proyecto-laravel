<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;

class DispositivoController extends Controller
{
    public function index()
    {
        $dispositivos = Dispositivo::with('aula')->get();
        return view('dispositivos.index', compact('dispositivos'));
    }
}
