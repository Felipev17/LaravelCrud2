@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Roles</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $roles->id_Rol) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label for="nombres">Codigo de rol</label>
                            <input type="text" name="id_Rol" id="id_Rol" class="form-control" value="{{ $roles->id_Rol }}" required>
                        </div>
                        <div class="form-group">
                            <label for="stock_minimo">Rol</label>
                            <input type="integer" name="rol" id="rol" class="form-control" value="{{ $roles->rol }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
