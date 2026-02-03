<?php

namespace App\Http\Controllers;

use App\Models\Aula;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::all();
        return view('aulas.index', compact('aulas'));
    }
}
