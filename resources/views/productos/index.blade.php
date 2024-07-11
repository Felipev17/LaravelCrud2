@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Productos</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Tipo de producto</th>
                                    <th>Ubicación</th>
                                    <th>Unidad de medida</th>
                                    <th>Existencia</th>
                                    <th>Stock mínimo</th>
                                    <th>Stock máximo</th>
                                    <th>Fecha de registro</th>
                                    <th>Costo</th>
                                    <th>Precio de venta</th>
                                    <th>IVA</th>
                                    <th>Acciones</th>
                                    <th>Alertas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->cod }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->tipo->tipo }}</td>
                                    <td>{{ $producto->ubicacion }}</td>
                                    <td>{{ $producto->umedida->umedida }}</td>
                                    <td>{{ $producto->existencia }}</td>
                                    <td>{{ $producto->stock_minimo }}</td>
                                    <td>{{ $producto->stock_maximo }}</td>
                                    <td>{{ $producto->fecha_vencimiento }}</td>
                                    <td>{{ $producto->costo }}$</td>
                                    <td>{{ $producto->precio_venta }}$</td>
                                    <td>{{ $producto->iva }}</td>
                                    <td>
                                        <form action="{{ route('productos.destroy', $producto->cod) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" style="background-color: #ff6600; border-color: #ff6600" onclick="return confirm('¿Estás seguro de querer eliminar este producto?')">Eliminar</button>
                                        </form>
                                    </td>
                                    @if ($producto->existencia <= $producto->stock_minimo)
                                    <td>
                                        <div class="alert alert-danger" role="alert">
                                            ¡Stock mínimo alcanzado!
                                        </div>
                                    </td>
                                    @else
                                    <td></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('pdf.exportar') }}" class="btn btn-primary" style="background-color: #ff6600; border-color: #ff6600; color: #f9f9f9;">Exportar a PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    body {
        background-color: #f9f9f9;
        font-family: "Arial", sans-serif;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .card-header {
        background-color: #9c9c9c;
        color: rgba(0, 0, 0);
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

    .card-body {
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #9a000f;
        color: #f2f2f2;
    }

    .alert {
        font-weight: bold;
        padding: 10px;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .card {
            margin-top: 10px;
        }

        .card-header {
            font-size: 1.2rem;
        }

        .card-body {
            padding: 15px;
        }

        table {
            font-size: 0.9rem;
        }

        .btn-primary {
            padding: 8px 16px;
        }
    }
</style>
@endsection
