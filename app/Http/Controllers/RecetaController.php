<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;
use App\Models\Productos;

class RecetaController extends Controller
{

    public function index()
    {
        // Obtener todas las recetas
        $recetas = Receta::all();
        return view('recetas.index', compact('recetas'));
    }

    public function create()
    {
        // Obtener la lista de productos para el formulario
        $productos = Productos::all();
        return view('recetas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'existencia' => 'required|array',
            'existencia.*' => 'required|numeric|min:1',
            'producto_id' => 'required|array',
            'producto_id.*' => 'exists:productos,cod',
        ]);

        // Crear la receta y asociar productos con sus cantidades utilizadas
        $receta = new Receta();
        $receta->nombre = $request->nombre;
        $receta->descripcion = $request->descripcion;
        $receta->save();

        foreach ($request->producto_id as $key => $productoId) {
            $receta->productos()->attach($productoId, ['existencia' => $request->existencia[$key]]);
        }

        // Redireccionar con un mensaje de éxito
        return redirect()->route('recetas.create')->with('success', 'Receta creada exitosamente.');
    }
}
