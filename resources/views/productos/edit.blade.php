@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Productos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('productos.update', $productos[1]->cod) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label for="nombres">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $productos->nombre }}" required>
                        </div>
                        <div class="form-group">
                            <label for="stock_minimo">Stock minimo</label>
                            <input type="integer" name="stock_minimo" id="stock_minimo" class="form-control" value="{{ $productos->stock_minimo }}" required>
                        </div>
                        <div class="form-group">
                            <label for="stock_maximo">Stock maximo</label>
                            <input type="integer" name="stock_maximo" id="stock_maximo" class="form-control" value="{{ $productos->stock_maximo }}" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_vencimiento">Fecha de vencimiento</label>
                            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{ $productos->fecha_vencimiento }}" required>
                        </div>
                        <div class="form-group">
                            <label for="costo">Costo</label>
                            <input type="integer" name="costo" id="costo" class="form-control" value="{{ $productos->costo }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cod_tipo">Tipo de producto</label>
                            <input type="integer" name="cod_tipo" id="cod_tipo" class="form-control" value="{{ $productos->cod_tipo }}" required>
                        </div>
                        <div class="form-group">
                            <label for="ubicacion">Ubicación</label>
                            <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="{{ $productos->ubicacion }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cod_umedida">Unidad de medida</label>
                            <input type="integer" name="cod_umedida" id="cod_umedida" class="form-control" value="{{ $productos->cod_umedida }}" required>
                        </div>
                        <div class="form-group">
                            <label for="precio_venta">Precio de venta</label>
                            <input type="integer" name="precio_venta" id="precio_venta" class="form-control" value="{{ $productos->precio_venta }}" required>
                        </div>
                        <div class="form-group">
                            <label for="existencia">Existencia</label>
                            <input type="integer" name="existencia" id="existencia" class="form-control" value="{{ $productos->existencia }}" required>
                        </div>
                        <div class="form-group">
                            <label for="iva">IVA</label>
                            <input type="integer" name="iva" id="iva" class="form-control" value="{{ $productos->iva }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
