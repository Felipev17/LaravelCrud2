<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/css/navbar.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Literata:ital,opsz,wght@0,7..72,200..900;1,7..72,200..900&display=swap" rel="stylesheet">
    <title>ChefControl</title>
    {{-- enlace a boostrap 5 css --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- enlace a estilos de css personalizados --}}
    @yield('style')
    {{-- <link rel="stylesheet" href="{{ asset('/css/style.css')}}"> --}}
    <style>
        /* Estilos para el encabezado */
        .headerRecetas {
            background-color: #9a000f; /* Color de fondo del navbar */
            border-bottom: 1px solid #ddd;
            padding: 10px 20px; /* Reducir el espaciado interno */
            color: #fff; /* Color del texto */
        }

        .contenedorHR {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo1Recetas {
            height: 60px; /* Aumentar la altura del logo */
            margin: 0; /* Eliminar margen alrededor del logo */
        }

        .btnMenuR {
            display: none; /* Ocultar el botón del menú en dispositivos de escritorio */
        }

        .menuRecetas {
            display: flex;
            align-items: center;
        }

        .menu-item {
            position: relative;
            margin: 0 10px; /* Reducir el espaciado entre los elementos del menú */
        }

        .menu-item a {
            text-decoration: none;
            color: #fff; /* Color del texto del menú */
            font-size: 14px; /* Reducir el tamaño de fuente del menú */
            padding: 10px 15px; /* Reducir el espaciado interno de los enlaces del menú */
            display: block;
        }

        .menu-item a:hover {
            background-color: #d32f2f; /* Cambiar color de fondo al pasar el ratón */
            border-radius: 5px; /* Añadir bordes redondeados al pasar el ratón */
        }

        /* Submenús */
        .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #9a000f; /* Color de fondo del submenú */
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .menu-item:hover .submenu {
            display: block;
        }

        .submenu a {
            padding: 10px 15px; /* Reducir el espaciado interno de los enlaces del submenú */
            font-size: 12px; /* Reducir el tamaño de fuente del submenú */
            color: #fff; /* Color del texto del submenú */
        }

        .submenu a:hover {
            background-color: #d32f2f; /* Cambiar color de fondo al pasar el ratón sobre el submenú */
        }

        /* Menú de hamburguesa (solo en dispositivos móviles) */
        @media (max-width: 768px) {
            .btnMenuR {
                display: block; /* Mostrar el botón del menú en dispositivos móviles */
            }

            .menuRecetas {
                display: none; /* Ocultar el menú en dispositivos móviles */
                position: absolute;
                top: 60px; /* Ajustar la posición del menú desplegable */
                left: 0;
                width: 100%;
                background-color: #9a000f; /* Color de fondo del menú en móviles */
                border-top: 1px solid #ddd;
                z-index: 1;
                flex-direction: column;
            }

            #btnMenu:checked ~ .menuRecetas {
                display: flex;
            }

            .menu-item {
                margin: 0;
            }

            .submenu {
                position: static; /* Ajustar la posición del submenú en dispositivos móviles */
                box-shadow: none;
            }

            .submenu a {
                padding: 10px 20px; /* Ajustar el espaciado interno del submenú en dispositivos móviles */
            }
        }
    </style>
</head>
<body>
    <header class="headerRecetas">
        <div class="contenedorHR">
            <div>
                <img class="logo1Recetas" src="{{asset('imagenes/proyecto/logo.svg')}}">
            </div>
            <div class="usuarioRecetas">
               
               
            </div>
            <div class="btnMenuR">
                <label for="btnMenu">Menú</label>
            </div>
            <input type="checkbox" id="btnMenu">
            <nav class="menuRecetas">
                <div class="menu-item">
                    <a href="{{ route('home') }}">Inicio</a>
                </div>
              
                <div class="menu-item">
                    <a href="#">Productos</a>
                    <div class="submenu">
                        <a href="{{ route('productos.create') }}">Nuevo Producto</a>
                        <a href="{{ route('productos.index') }}">Lista de Productos</a>
                        <a href="{{ route('tipo.create') }}">tipo de producto</a>
                        <a href="{{route('ingresos.create')}}">Ingreso de productos</a>
                        <a href="{{route('ingresos.index')}}">Lista de ingresos</a>
                        <a href="{{route('salida.create')}}">Salida de producto</a>
                        <a href="{{route('salidas.index')}}">Lista de salidas</a>
                        
                    </div>
                </div>
             
            
                <div class="menu-item">
                    <a href="#">Exportar</a>
                    <div class="submenu">
                        <a href="{{ route('pdf.exportar') }}">Exportar productos</a>
                        <a href="{{ route('salidas.pdf') }}">Exportar salidas</a>
                        <a href="{{ route('ingresos.pdf') }}">Exportar ingresos</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>
    {{-- enlace a boostrap 5 js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
