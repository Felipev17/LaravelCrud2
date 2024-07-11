@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Receta</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('recetas.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" class="form-control" required></textarea>
                        </div>

                        @foreach ($productos as $producto)
                        <div class="form-group">
                            <label for="producto_{{ $producto->cod }}">{{ $producto->nombre }}</label>
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="existencia[]" class="form-control" placeholder="Cantidad utilizada" required>
                                </div>
                            </div>
                            <input type="hidden" name="producto_id[]" value="{{ $producto->cod }}"> <!-- Campo oculto para enviar el producto_id -->
                        </div>
                    @endforeach
                    


                        <button type="submit" class="btn btn-primary">Crear Receta</button>
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

