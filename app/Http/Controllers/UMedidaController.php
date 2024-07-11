<?php

namespace App\Http\Controllers;

use App\Models\umedida;
use Illuminate\Http\Request;

class UMedidaController extends Controller
{
    
    public function index()
    {
        $umedida = UMedida::all();
        return view('umedida.index', compact('umedida'));
    }

    public function create()
    {
        return view('umedida.create');
    }

    
    public function store(Request $request)
    {
        UMedida::create($request->all());
        return redirect()->route('umedida.index');
    }

   
    public function edit(UMedida $umedida)
    {
        return view('umedida.edit', compact('umedida'));
    }

    public function update(Request $request, UMedida $umedida)
    {
        $umedida->update($request->all());
        return redirect()->route('umedida.index');
    }

    
    public function destroy(UMedida $umedida)
    {
        $umedida->delete();
        return redirect()->route('umedida.index');
    }

    
}
