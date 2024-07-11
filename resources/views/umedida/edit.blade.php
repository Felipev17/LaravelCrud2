@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar unidades de medida</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('umedida.update', $roles->id_Rol) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label for="umedida">Unidad de medida</label>
                            <input type="integer" name="umedida" id="umedida" class="form-control" value="{{ $umedida->umedida }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('umedida.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
