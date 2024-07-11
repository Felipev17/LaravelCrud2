<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salida;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;

class SalidaController extends Controller
{
    // Método para mostrar el formulario de creación de salida
    public function create()
    {
        // Obtener todos los productos disponibles
        $productos = Productos::all();
        
        // Devolver la vista del formulario de creación con los productos
        return view('salidas.create', compact('productos'));
    }


    public function index()
    {
            // Obtener todas las salidas de productos
            // $salidas = DB::table('salidas')
            //         ->join('productos', 'salidas.producto_id', '=', 'productos.cod')
            //         ->join('umedida', 'productos.cod_umedida', '=', 'umedida.cod_umedida')
            //         ->select('salidas.id', 'productos.nombre', 'salidas.existencia', 'umedida.umedida', 'salidas.created_at')
            //         ->get();

            $salidas = (new Salida);

            $salidas = $salidas->with(['producto.umedida'])->get();
        
            // Obtener todos los productos disponibles
            $productos = Productos::all();
            
            // Devolver la vista de la lista de salidas con los datos de las salidas y los productos
            return view('salidas.index', compact('salidas', 'productos'));
    }
    // Método para almacenar la salida en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada del formulario
        $request->validate([
            'producto_id' => 'required|exists:productos,cod', // Verifica que el producto exista en la tabla de productos
            'existencia' => 'required|integer|min:1', // La existencia debe ser un número entero mayor que cero
        ]);

        // Obtener el producto seleccionado
        $producto = Productos::findOrFail($request->producto_id);

        // Verificar si hay suficiente existencia del producto
        if ($request->existencia > $producto->existencia) {
            // Si no hay suficiente existencia, redirigir de vuelta al formulario con un mensaje de error
            return redirect()->back()->withErrors(['error' => 'No hay suficiente existencia del producto.']);
            // return "ERROR";
        }

        // Restar la cantidad de productos retirasdos de la existencia del producto
        $producto->existencia -= $request->existencia;
        $producto->save();

        // Registrar la salida del producto
        Salida::create([
            'producto_id' => $producto->cod, // Guardar el ID del producto
            'existencia' => $request->existencia, // Guardar la cantidad retirada
        ]);

        // Redirigir a la página de índice de salidas con un mensaje de éxito
        return redirect()->route('salidas.index')->with('success', 'Salida registrada exitosamente.');
    }

    public function vistaproducto()
    {
        // Obtener todas las salidas de productos
        $productos = Productos::all();
        
        // Devolver la vista de la lista de salidas con los datos de las salidas
        return view('salidas.index', compact('productos'));
    }
}
