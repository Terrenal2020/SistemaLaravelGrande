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
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarPoos') }}">POS</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarUsuarios') }}">Datos Usuarios</a>
            </li>
            <label style=" margin-left: 2%; padding-top:1%; color: rgb(162, 152, 216) ">BIENVENIDO AL SISTEMA: </label>

            <label style=" margin-left: 2%; padding-top:0.5%; color: rgb(162, 152, 216)"><big>{{ $_SESSION['usuario']}}</big> </label>

            <label style=" margin-left: 25%; padding-top:1%; color: rgb(162, 152, 216)"><a style="color:rgb(162, 152, 216)" href="{{ url('/') }}">[->]Salir</a></label>
        </ul>
    </div>
</div>
<br>


<div align="center">
    <h3>¡Sistema de inventarios y ventas!</h3><br>
    <h3>Bienvenido <span class="text-danger">{{ $_SESSION['usuario'] }}</span></h3>
    <p><b>Iniciar Registro de nuevos -</b> registra al personal <br>
        <b>Administracion de almacenes -</b> Consulta los almacenes, para poder modificar, o dar de baja <br>
        <b>Datos de la Autoridad -</b> informacion del usuario
    </p>
</div>

<br>
<!-- partial -->
<?php
if ($_SESSION['idUsuario'] ==1) {
?>
    <br>
    <div align="center">
        <a class="btn btn-primary" href="{{ route('getRegistro') }}">REGISTRAR NUEVOS EMPLEADOS </a>
    </div>
    <br>
    <div>
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

            <li class="nav-item">
                <a class="nav-link active disabled ">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="{{ route('getMostrarAlmacenes')}}">Administracion de Almacenes </a>

            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarProveedores')}}">Administracion de Proveedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarCategorias')}}">Departamentos</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('getMostrarInventario')}}">Inventarios</a>
            </li>
          
        </ul>
    </div>
<?php
} ?>

<br>
<div align="center">
    <footer class="main-footer">
   
 
  </footer>
</div>
@endsection
