@extends('layouts.app')

@section('content')
<div class="carlos" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Nuevo Usuario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="documento">Documento</label>
                            <input type="text" name="documento" id="documento" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" id="nombres" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Telefono">Telefono</label>
                            <input type="Double" name="Telefono" id="Telefono" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-control" id="rol" name="Rol">
                                <option value="" selected disabled>Seleccione un Rol</option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id_Rol }}">{{ $rol->Rol }}</option>
                                @endforeach
                            </select>
                        </div>    
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" >
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">Mostrar</button>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button><a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');

        togglePasswordButton.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePasswordButton.textContent = 'Ocultar';
            } else {
                passwordField.type = 'password';
                togglePasswordButton.textContent = 'Mostrar';
            }
        });
    });
</script>
@section('style')
<style>
.carlos{
  background-color: #f5f5f5; /* Color de fondo gris muy claro */
  padding: 20px;
  border-radius: 10px;
  width: 80%;
  margin-left: 150px
}



.column {
  flex: 1; /* Las columnas ocupan el mismo ancho */
}

.label-column {
  text-align: right; /* Alinea los labels a la derecha */
  padding-right: 10px; /* Espacio a la derecha de los labels */
}

.input-column {
  padding-left: 10px; /* Espacio a la izquierda de los inputs */
}
h3{
    justify-content: center;
    text-align: center;
    font-size: 1.3rem;  
    margin-bottom: 30px;
}
label {
  display: block; /* Cada label en una línea */
  margin-bottom: 15px; /* Espacio entre labels */
}

input[type="text"],
input[type="number"],
input[type="date"],
input[type="double"],
input[type="password"],
select {
  width: 100%; /* Los inputs ocupan todo el ancho disponible */
  padding: 8px;
  border: 1px solid transparent; /* Borde transparente por defecto */
  border-radius: 5px;
  background-color: white; /* Color de fondo blanco */
  transition: border-color 0.3s ease; /* Transición suave para el borde */
  margin-bottom: 10px;
}

input[type="text"]:hover,
input[type="number"]:hover,
input[type="date"]:hover,
select:hover {
  border-color: #9a000f; /* Color del borde al hacer hover */
}


button {
  padding: 10px 20px;
  background-color: #ff6600; /* Color de fondo naranja */
  color: white;
  border: none;
  width: 200px;
  border-radius: 20px; /* Esquinas redondeadas */
  cursor: pointer;
  transition: background-color 0.3s ease; /* Transición suave para el color de fondo */
  margin-top: 20px; /* Espacio encima de los botones */
  color: white;
  
}


button:hover {
  background-color: #ff8c00; /* Color de fondo naranja más claro al hacer hover */
}




</style>


@endsection


