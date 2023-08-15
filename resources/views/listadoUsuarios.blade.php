<?php
if (!isset($_SESSION)) {
    header('Cache-Control: no cache'); //no cache
    session_cache_limiter('private_no_expire');
    session_start();
   // $_SESSION['nombre'] = null;
   // $_SESSION['apepat'] = null;
   // $_SESSION['apemat'] = null;
   // $_SESSION['curp'] = null;
} ?>
@extends('plantilla')
@section('seccion')
<div>
    <div>
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

            <li class="nav-item">
                <a class="nav-link active disabled ">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="{{ route('getMostrar')}}">Menu Principal</a>

            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Ventas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="">Datos del Administrador</a>
            </li>
            <label style=" margin-left: 2%; padding-top:1%; color: rgb(162, 152, 216) ">BIENVENIDO AL SISTEMA: </label>

            <label style=" margin-left: 2%; padding-top:0.5%; color: rgb(162, 152, 216)"><big>{{ $_SESSION['usuario']}}</big> </label>

            <label style=" margin-left: 25%; padding-top:1%; color: rgb(162, 152, 216)"><a style="color:rgb(162, 152, 216)" href="{{ url('/') }}">[->]Salir</a></label>
        </ul>
    </div>
</div>
<br>
<div>
    <form method="POST" action="">
        @csrf
        <h4> Busqueda de Usuarios</h4>
        <br>
        <div class="row">
            <div class="col-lg-4 col-sm-12 form-group">
        
        </div>
        <div class="col-lg-4 col-sm-12 form-group">
           
        </div>
    </div>
       
            
    </form>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #FFFEE4;">

            <li class="nav-item">
                <a class="nav-link active " >Listado de Usuarios</a>
            </li>
            
        </ul>
    </div>
</div>

<div align="center">
    <div class="card-body">

    <table class="table">
<thead class="thead-dark">
    <tr>
    <th scope="col">Id</th>
        <th scope="col">Nombre del Empleado</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Cargo</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono</th>
        
       
       
    </tr>
</thead>
<tbody>
@foreach($empleados as $empleadoss)
    <tr>
    <th scope="row">{{$empleadoss->id}}</th>
        <td>{{$empleadoss->nombre}}</td>
        <td> {{$empleadoss->apellidoPaterno}} {{$empleadoss->apellidoMaterno}}</td>
        <td>{{$empleadoss->cargo}}</td>
        <td>{{$empleadoss->direccion}}</td>
        <td>{{$empleadoss->telefono}}</td>
       
        
        <form action="{{ route('eliminarEmpleado',$empleadoss->id)}}" method="POST">
                        @csrf

                        @method('DELETE')
                        <td><button type="submit" class="btn btn-danger" href="">Borrar </button></td>
                       
                    </form>
       
        <td><a class="btn btn-warning" href="{{ route('getEditarAlmacenes',$empleadoss->id) }}">Editar </a></td>
                      
    </tr>
    @endforeach

</tbody>
</table>

{{ $empleados->links() }}    </div>

</div>


<br>
<!-- partial -->
<?php
if ($_SESSION['idUsuario'] ==1) {
?>
    <br>
    
    <br>
    
<?php
} ?>

<br>
<div align="center">
    <footer class="main-footer">
   
 
  </footer>
</div>
@endsection
