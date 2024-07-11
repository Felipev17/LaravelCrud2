@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar tipos de productos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tipo.update', $tipo->cod_tipo) }}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div class="form-group">
                            <label for="tipo">Tipo de producto</label>
                            <input type="integer" name="tipo" id="tipo" class="form-control" value="{{ $tipo->tipo }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('tipo.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
