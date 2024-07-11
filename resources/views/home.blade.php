@extends('layouts.app')

@section('content')
<div class="container mt-5" style="z-index: 1;"> <!-- Agregar margen superior y ajustar z-index -->
    <img class="logo1Recetas" src="{{ asset('imagenes/proyecto/logo.svg') }}" alt="Logo de ChefControl">
    <p>Acciones Disponibles:</p>
    <div class="card-body"> <!-- Quitar la clase mt-5 de la tarjeta -->
        <P>Listas:</P>
        <a href="{{ route('productos.index') }}" class="boton">Lista de Productos</a>
        <a href="{{ route('ingresos.index') }}" class="boton">Lista de ingresos</a>
        <a href="{{ route('salidas.index') }}" class="boton">Lista de salidas</a>
        <a href="{{ route('umedida.index') }}" class="boton">Lista de unidades de medida</a>
        <a href="{{ route('tipo.index') }}" class="boton">Lista de tipos de productos</a>

        <P>Registros:</P>
        <a href="{{ route('productos.create') }}" class="boton">Nuevo producto</a>
        <a href="{{ route('salida.create') }}" class="boton">Salida de Productos</a>
        <a href="{{ route('ingresos.create') }}" class="boton">Ingreso de productos</a>
        <a href="{{ route('umedida.create') }}" class="boton">Unidades de medida</a>
        <a href="{{ route('tipo.create') }}" class="boton">Tipo de productos</a>
    </div>
</div>
@endsection

@section('style')
<style>
    /* Estilos para el contenedor principal */
    .container {
        position: fixed;
        top: 40px; /* Ajustar el margen superior para separarse del navbar */
        left: 50%;
        transform: translateX(-50%);
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 90%; /* Ancho fijo */
        max-width: 800px; /* Ancho máximo del contenedor */
        display: flex; /* Mostrar elementos como flexbox */
        flex-direction: column; /* Alinear elementos verticalmente */
        justify-content: center; /* Alinear contenido verticalmente */
        align-items: center; /* Alinear contenido horizontalmente */
        z-index: 1; /* Establecer z-index para que esté por encima del contenido detrás */
    }

    /* Estilos para los botones dentro del contenedor */
    .boton {
        background-color: #ff6600;
        border: none;
        color: #ffffff;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px 0;
        cursor: pointer;
        transition: background-color 0.3s;
        border-radius: 5px;
        width: 100%;
        max-width: 300px; /* Ancho máximo de los botones */
        text-overflow: ellipsis; /* Agregar puntos suspensivos si el texto es muy largo */
        overflow: hidden; /* Ocultar texto que exceda el ancho */
        white-space: nowrap; /* Evitar que el texto se divida en varias líneas */
    }

    .boton:hover {
        background: linear-gradient(45deg, #ff8c00, #ffae42); /* Cambio a tono más claro al hacer hover */
    }

    /* Estilos para el texto */
    p {
        font-size: 1.2rem;
        margin-top: 20px;
        
    }

    /* Estilos para el logo */
    .logo1Recetas {
        max-width: 100%; /* Ancho máximo del logo */
        margin-bottom: 20px; /* Espacio entre el logo y los botones */
    }

    @media (max-width: 576px) {
        .container {
            width: 95%; /* Ajuste del ancho en dispositivos móviles */
        }
    }

</style>
@endsection
