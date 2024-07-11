<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px; /* Reduce el tamaño de la fuente */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align:center;
            padding: 5px; /* Aumenta el padding para que sea más visible */
        }
        th {
            background-color: #ff6600; /* Cambia el color de fondo */
            color: white; /* Cambia el color del texto */
        }
        .logo {
            float: left; /* Alinea el logo a la izquierda */
            margin-right: 20px; /* Añade un margen derecho */
        }
        .title {
            text-align: center; /* Centra el título */
            margin-bottom: 20px; /* Añade un margen inferior */
        }
    </style>
</head>
<body>
    <img src="{{ asset('imagenes/proyecto/logo.svg') }}" alt="Logo" class="logo"> <!-- Añade la ruta de tu logo SVG -->
    <h1 class="title">Lista de Productos</h1> <!-- Añade una clase "title" al título -->
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Tipo producto</th>
                <th>Ubicación</th>
                <th>Unidad medida</th>
                <th>Existencia</th>
                <th>Stock mínimo</th>
                <th>Stock máximo</th>
                <th>Fecha registro</th>
                <th>Costo</th>
                <th>Precio de venta</th>
                <th>IVA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
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
                <td>{{ $producto->precio_venta }}</td>
                <td>{{ $producto->iva }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
