@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registro de Salida de Productos</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('salida.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="producto">Producto</label>
                    <select name="producto_id" id="cod" class="form-control">
                        @foreach ($productos as $producto)
                        <option value="{{ $producto->cod }}">
                            {{ $producto->nombre }} ({{ $producto->umedida->umedida }}) - Existencia: {{ $producto->existencia }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad a retirar</label>
                    <input type="number" name="existencia" id="existencia" class="form-control" required>
                    @error('existencia')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #ff6600; border-color: #ff6600;">Registrar salida</button>
            </form>
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

.btn-primary {
    padding: 10px 25px;
    font-size: 14px;
    border-radius: 20px; 
}

.btn-primary:hover {
    background-color: #ff8c00;
    border-color: #ff8c00;
}
</style>
@endsection