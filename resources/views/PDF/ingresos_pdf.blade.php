<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ingresos</title>
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
    <h1>PDF de Ingresos</h1>
    <table>
        <thead>
            <tr>
                <th>ID de Ingreso</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha de Ingreso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ingresos as $ingreso)
            <tr>
                <td>{{ $ingreso->id }}</td>
                <td>{{ $ingreso->producto->nombre }}</td>
                <td>{{ $ingreso->cantidad }}</td>
                <td>{{ $ingreso->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

