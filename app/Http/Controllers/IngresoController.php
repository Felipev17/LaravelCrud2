<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\Productos;

class IngresoController extends Controller
{
    // Método para mostrar el formulario de registro de ingreso
    public function create()
    {
        // Obtener todos los productos disponibles para el formulario
        $productos = Productos::all();
        
        // Devolver la vista del formulario de registro de ingreso con los productos
        return view('ingresos.create', compact('productos'));
    }

    // Método para almacenar el registro de ingreso en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada del formulario
        $request->validate([
            'producto_id' => 'required|exists:productos,cod', // Verifica que el producto exista en la tabla de productos
            'cantidad' => 'required|integer|min:1', // La cantidad debe ser un número entero mayor que cero
        ]);

        // Crear el registro de ingreso en la base de datos
        Ingreso::create([
            'producto_id' => $request->producto_id, // Guardar el ID del producto
            'cantidad' => $request->cantidad, // Guardar la cantidad ingresada
        ]);

        // Actualizar la existencia del producto
        $producto = Productos::findOrFail($request->producto_id);
        $cantidad = $producto->existencia + $request->cantidad;
        $producto->update(['existencia' => $cantidad]);

        // Redirigir a la página de índice de ingresos con un mensaje de éxito
        return redirect()->route('ingresos.index')->with('success', 'Registro de ingreso realizado exitosamente.');
    }

    // Método para mostrar una lista de todos los registros de ingreso
    public function index()
    {
        // Obtener todos los registros de ingreso
        $ingresos = Ingreso::all();
        
        // Devolver la vista de la lista de ingresos con los datos de los ingresos
        return view('ingresos.index', compact('ingresos'));
    }

    // Método para buscar ingresos por producto, ID o unidad de medida
    public function search(Request $request)
    {
        // Obtener el término de búsqueda del formulario
        $search = $request->input('search');

        // Buscar ingresos que coincidan con el término de búsqueda en el nombre del producto, ID o unidad de medida
        $ingresos = Ingreso::whereHas('producto', function ($query) use ($search) {
            $query->where('nombre', 'like', '%' . $search . '%')
                  ->orWhere('cod', 'like', '%' . $search . '%');
        })->orWhereHas('producto.umedida', function ($query) use ($search) {
            $query->where('umedida', 'like', '%' . $search . '%');
        })->get();

        // Devolver la vista de la lista de ingresos con los datos de los ingresos encontrados
        return view('ingresos.index', compact('ingresos'));
    }

    // Otros métodos del controlador...

    // Método para mostrar detalles de un registro de ingreso específico
    public function show(Ingreso $ingreso)
    {
        // Devolver la vista con los detalles del registro de ingreso
        return view('ingresos.show', compact('ingreso'));
    }

    // Método para editar un registro de ingreso específico
    public function edit(Ingreso $ingreso)
    {
        // Obtener todos los productos disponibles para el formulario
        $productos = Productos::all();
        
        // Devolver la vista del formulario de edición de ingreso con los datos del ingreso y los productos
        return view('ingresos.edit', compact('ingreso', 'productos'));
    }

    // Método para actualizar un registro de ingreso en la base de datos
    public function update(Request $request, Ingreso $ingreso)
    {
        // Validar los datos de entrada del formulario
        $request->validate([
            'producto_id' => 'required|exists:productos,cod', // Verifica que el producto exista en la tabla de productos
            'cantidad' => 'required|integer|min:1', // La cantidad debe ser un número entero mayor que cero
        ]);

        // Actualizar el registro de ingreso en la base de datos
        $ingreso->update([
            'producto_id' => $request->producto_id, // Actualizar el ID del producto
            'cantidad' => $request->cantidad, // Actualizar la cantidad ingresada
        ]);

        // Redirigir a la página de índice de ingresos con un mensaje de éxito
        return redirect()->route('ingresos.index')->with('success', 'Registro de ingreso actualizado exitosamente.');
    }

    // Método para eliminar un registro de ingreso de la base de datos
    public function destroy(Ingreso $ingreso)
    {
        // Eliminar el registro de ingreso de la base de datos
        $ingreso->delete();

        // Redirigir a la página de índice de ingresos con un mensaje de éxito
        return redirect()->route('ingresos.index')->with('success', 'Registro de ingreso eliminado exitosamente.');
    }
}
