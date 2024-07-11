<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\UMedida;
use App\Models\Tipo;

class ProductosController extends Controller
{

    public function index()
    {
        $productos = Productos::with('tipo', 'umedida')->get();
        return view('productos.index', compact('productos'));
    }
    
    public function create()
    {
        // Obtener todos los tipos de producto desde el modelo Tipo
        $tipos = Tipo::all();
    
        // Obtener todas las unidades de medida desde el modelo UMedida
        $umedidas = UMedida::all();
    
        // Pasar los tipos de producto y las unidades de medida a la vista
        return view('productos.create', compact('tipos', 'umedidas'));
    }

    public function store(Request $request)
    {
        Productos::create($request->all());
        return redirect()->route('productos.index');
    }

    public function edit(Productos $productos)
    {
        return view('productos.edit', compact('productos'));
    }

    public function update(Request $request, Productos $productos)
    {
        $productos->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Productos $productos)
    {
        $productos->delete();
        return redirect()->route('productos.index');
    }
}
