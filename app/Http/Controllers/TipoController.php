<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipo.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipo.create');
    }

    public function store(Request $request)
    {
        $tipo = new Tipo();
        $tipo->tipo = $request->input('tipo');
        // Asigna otros campos necesarios aquí

        $tipo->save();

        return redirect()->route('tipo.index');
    }

    public function edit(Tipo $tipo)
    {
        return view('tipo.edit', compact('tipo'));
    }

    public function update(Request $request, Tipo $tipo)
    {
        $tipo->update($request->all());
        return redirect()->route('tipo.index');
    }

    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipo.index');
    }
}
