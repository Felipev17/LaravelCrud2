@extends('layouts.app')

{{-- @section('css')
    <link rel="stylesheet" href="">
@endsection --}}

@section('content')
<div class="carlos" style="margin-top: 100px">
    
                <div class="card-header">
                    <h3 class="card-title">Unidades de medida</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Unidad de medida</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($umedida as $umedida)
                            <tr>
                                <td>{{ $umedida->cod_umedida }}</td>
                                <td>{{ $umedida->umedida }}</td>
                                <td>
                                    <form action="{{ route('umedida.destroy', $umedida->cod_umedida) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" style="background-color: #ff6600; border-color: #ff6600" onclick="return confirm('¿Estás seguro de querer eliminar este rol?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
      
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
