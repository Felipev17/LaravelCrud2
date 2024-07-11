@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px"> 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registrar un producto</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="stock_minimo">Stock mínimo</label>
                            <input type="number" name="stock_minimo" id="stock_minimo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="stock_maximo">Stock máximo</label>
                            <input type="number" name="stock_maximo" id="stock_maximo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_vencimiento">Fecha de registro</label>
                            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="costo">Costo</label>
                            <input type="number" name="costo" id="costo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cod_tipo">Tipo de producto</label>
                            <select class="form-control" id="cod_tipo" name="cod_tipo" required>
                                <option value="" selected disabled>Seleccione un tipo</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->cod_tipo }}">{{ $tipo->tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ubicacion">Ubicación</label>
                            <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cod_umedida">Unidad de medida</label>
                            <select class="form-control" id="cod_umedida" name="cod_umedida" required>
                                <option value="" selected disabled>Seleccione una unidad</option>
                                @foreach ($umedidas as $umedida)
                                    <option value="{{ $umedida->cod_umedida }}">{{ $umedida->umedida }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="precio_venta">Precio de venta</label>
                            <input type="number" name="precio_venta" id="precio_venta" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="existencia">Existencia</label>
                            <input type="number" name="existencia" id="existencia" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="iva">IVA</label>
                            <input type="number" name="iva" id="iva" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg" style="background-color: #ff6600; border-color: #ff6600; color: #f9f9f9;">Guardar</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
.card {
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #9a000f;
    color: #fff;
    border-radius: 15px 15px 0 0;
    padding: 15px;
}

.card-title {
    margin-bottom: 0;
}

.card-body {
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: normal;
}

input[type="text"],
input[type="number"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    background-color: #f8f9fa;
}

.btn-primary,
.btn-secondary {
    padding: 10px 25px;
    font-size: 14px;
    border-radius: 20px; 
}

.btn-primary:hover,
.btn-secondary:hover {
    background-color: #ff6600;
    border-color: #ff6600;
}
</style>
@endsection
