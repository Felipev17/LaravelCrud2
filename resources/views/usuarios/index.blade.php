@extends('layouts.app')

{{-- @section('css')
    <link rel="stylesheet" href="">
@endsection --}}

@section('content')
<div class="carlos" style="margin-top: 100px" >
    
                <div class="card-header">
                    <h3 class="card-title">Lista de Usuarios</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)

                            
                            <tr>
                               
                                <td>{{ $usuario->documento }}</td>
                                <td>{{ $usuario->nombres }}</td>
                                <td>{{ $usuario->apellidos }}</td>
                                <td>{{ $usuario->Telefono }}</td>
                                <td>{{ $usuario->rol->Rol }}</td>



                                <td>
                                    <form action="{{ route('usuarios.destroy', $usuario->documento) }}" method="POST">
                                        <a href="{{ route('usuarios.edit', $usuario->documento) }}" class="btn btn-sm btn-primary">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
          
    </div>
</div>
@endsection
@section('style')
<style>
*{
margin: 0;
padding: 0;
box-sizing: border-box;    
}


body {
	
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: "Raleway", sans-serif;
	background-color: #eef4fd;
}

.carlos {
	display: flex;
	flex-direction: column;
	box-shadow: 8px 8px 5px 0px #dcdbdbbf;
	width: 58.5%;
	background-color: #ede5e5;
	border-radius: 30px;
    margin-left: 270px;
    font-size: 1.2rem;
    
}

h3 {
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 20px 30px 0;
    margin-bottom: 30px;
}



select {
	border: none;
	border-bottom: 1px solid #c9c9c9;
	width: 200px;
	padding: 10px 0;
	font-size: 16px;
}
button{
    background:linear-gradient(#ff6600,#ff7519,#fc9049);
	color: #ffffff;
	padding: 10px 30px;
	border-radius: 20px;
	text-transform: uppercase;
    border: none;
}




table {
	border-spacing: 0;
	margin-top: 1rem;
}

thead {
	background-color: #9a000f ;

}

th {
	padding: 10px;
    width: 50px;
}

tbody tr {
	border-bottom: 1px solid #dfdfdf;
    width: 80%;
}

tbody td {
	padding: 10px;
	border-bottom: 1px solid #dfdfdf;
	text-align: center;
}



tbody tr:hover {
	background-color: #f5f5f5;
}

.table_fotter {
	margin-top: 1rem;
	padding: 0 30px 20px;
}

    
</style>

@endsection
