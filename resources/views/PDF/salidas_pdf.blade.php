<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Salidas</title>
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
    <h1>Lista de Salidas</h1>
    <table>
        <thead>
            <tr>
                <th>Código de salida</th>
                <th>Producto</th>
                <th>Cantidad retirada</th>
                <th>Unidad de medida</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salidas as $salida)
            <tr>
                <td>{{ $salida->id }}</td>
                <td>{{ $salida->producto->nombre }}</td>
                <td>{{ $salida->existencia }}</td>
                <td>{{ $salida->producto->umedida->umedida }}</td>
                <td>{{ $salida->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
