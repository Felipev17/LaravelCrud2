@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px"> 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registrar un tipo de producto</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tipo.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="tipo">Tipo de producto</label>
                            <input type="text" name="tipo" id="tipo" class="form-control" required>
                        </div>
                       
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg" style="background-color: #ff6600; border-color: #ff6600; color: #f9f9f9;">Guardar</button>
                            <a href="{{ route('tipo.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
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
